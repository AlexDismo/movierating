<?php

namespace App\Services;

use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Review;

class MovieService
{
    public function __construct(
        private DatabaseInterface $db
    ) {
    }

    public function store(string $name, string $country, string $age_limit, string $budget, string $duration, string $description, UploadedFileInterface $image, array $categories, array $actors): false|int
    {
        $filePath = $image->move('movies');

        $movieId = $this->db->insert('movies', [
            'name' => $name,
            'description' => $description,
            'preview' => $filePath,
            'country' => $country,
            'age_limit' => intval($age_limit),
            'budget' => intval($budget),
            'duration' => intval($duration),
        ]);

        if ($movieId !== false) {
            foreach ($categories as $categoryId) {
                $this->db->insert('movies_categories', [
                    'movie_id' => $movieId,
                    'category_id' => $categoryId,
                ]);
            }
            foreach ($actors as $actorId) {
                $this->db->insert('movies_actors', [
                    'movie_id' => $movieId,
                    'actor_id' => $actorId,
                ]);
            }
        }

        return $movieId;
    }

    public function all(): array
    {
        $movies = $this->db->get('movies');

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['budget'],
                $movie['age_limit'],
                $movie['country'],
                $movie['duration'],
                $movie['preview'],
                $movie['created_at'],
            );
        }, $movies);
    }


    public function destroy(int $id): void
    {
        $this->db->delete('movies', [
            'id' => $id,
        ]);
    }

    public function find(int $id): ?Movie
    {
        $movie = $this->db->first('movies', [
            'id' => $id,
        ]);

        if (! $movie) {
            return null;
        }

        $genres = $this->db->get('movies_categories', ['movie_id' => $id]);

        $allActors = $this->db->get('movies_actors', ['movie_id' => $id]);

        $actors = [];
        $categories = [];

        foreach ($genres as $genre) {
            $category = $this->db->first('categories', ['id' => $genre['category_id']]);
            if ($category) {
                $categories[] = $category['name'];
            }
        }

        foreach ($allActors as $actor) {
            $actor = $this->db->first('actors', ['id' => $actor['actor_id']]);
            if ($actor) {
                $actors[] = [
                    'name' => $actor['name'],
                    'avatar' => $actor['avatar']
                ];
            }
        }

        return new Movie(
            $movie['id'],
            $movie['name'],
            $movie['description'],
            $movie['budget'],
            $movie['age_limit'],
            $movie['country'],
            $movie['duration'],
            $movie['preview'],
            $movie['created_at'],
            $categories,
            $actors
        );
    }

    public function update(int $id, string $name, string $country, string $age_limit, string $budget, string $duration, string $description, ?UploadedFileInterface $image, array $categories, array $actors): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'country' => $country,
            'age_limit' => intval($age_limit),
            'budget' => intval($budget),
            'duration' => intval($duration),
        ];

        if ($image && ! $image->hasError()) {
            $data['preview'] = $image->move('movies');
        }

        $this->db->update('movies', $data, [
            'id' => $id,
        ]);

        $this->db->delete('movies_categories', [
            'movie_id' => $id,
        ]);
        $this->db->delete('movies_actors', [
            'movie_id' => $id,
        ]);

        foreach ($categories as $categoryId) {
            $this->db->insert('movies_categories', [
                'movie_id' => $id,
                'category_id' => $categoryId,
            ]);
        }
        foreach ($actors as $actorId) {
            $this->db->insert('movies_actors', [
                'movie_id' => $id,
                'actor_id' => $actorId,
            ]);
        }
    }

    public function new(): array
    {
        $movies = $this->db->get('movies', [], ['id' => 'DESC'], 10);

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['budget'],
                $movie['age_limit'],
                $movie['country'],
                $movie['duration'],
                $movie['preview'],
                $movie['created_at'],
            );
        }, $movies);
    }

    private function getReviews(int $id): array
    {
        $reviews = $this->db->get('reviews', [
            'movie_id' => $id,
        ]);

        return array_map(function ($review) {
            $user = $this->db->first('users', [
                'id' => $review['user_id'],
            ]);

            return new Review(
                $review['id'],
                $review['rating'],
                $review['review'],
                $review['created_at'],
                new User(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                )
            );
        }, $reviews);
    }
    public function genres($id): array
    {
        return $this->db->get('movies_genres', ['movie_id' => $this->$id]);
    }
}
