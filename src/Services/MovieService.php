<?php

namespace App\Services;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Review;

class MovieService
{
    public function __construct(
        private DatabaseInterface $db,
        private AuthInterface $auth,
    ) {
    }

    public function store(string $name, string $country, string $release_date, string $age_limit, string $budget, string $duration, string $description, UploadedFileInterface $image, array $categories, array $actors): false|int
    {
        $filePath = $image->move('movies');

        $movieId = $this->db->insert('movies', [
            'name' => $name,
            'description' => $description,
            'preview' => $filePath,
            'country' => $country,
            'release_date' => $release_date,
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
                $movie['release_date'],
                $movie['country'],
                $movie['duration'],
                $movie['preview'],
                $movie['created_at'],
                "0000"
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

        $user = $this->auth->user();
        $userStatus = $user ? $this->db->get('users_movies', ['movie_id' => $id, 'user_id' => $user->id()]) : null;

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
            $movie['release_date'],
            $movie['country'],
            $movie['duration'],
            $movie['preview'],
            $movie['created_at'],
            $userStatus[0]['data']?: '0000',
            $categories,
            $actors,
            $this->getReviews($id),

        );
    }

    public function update(int $id, string $name, string $release_date, string $country, string $age_limit, string $budget, string $duration, string $description, ?UploadedFileInterface $image, array $categories, array $actors): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'country' => $country,
            'release_date' => $release_date,
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

    public function getActorIdsForMovie(int $movieId): array
    {
        $actors = $this->db->get('movies_actors', ['movie_id' => $movieId]);
        return array_map(fn($actor) => $actor['actor_id'], $actors);
    }

    public function updateUserStatus(string $status, int $movieId): void
    {
        $user = $this->auth->user();

        $record = $this->db->first('users_movies', ['user_id' => $user->id(), 'movie_id' => $movieId]);

        if ($record) {
            $this->db->update('users_movies', ['data' => $status], ['user_id' => $user->id(), 'movie_id' => $movieId]);
        } else {
            // Если записи не существует, создаем новую
            $this->db->insert('users_movies', ['user_id' => $user->id(), 'movie_id' => $movieId, 'data' => $status]);
        }
    }

    public function new(int $limit = 10, int $offset = 0, int $categoryId = null): array
    {
        $movies = $categoryId
            ? $this->db->query("SELECT m.* FROM movies m JOIN movies_categories mc ON m.id = mc.movie_id WHERE mc.category_id = $categoryId ORDER BY m.id DESC LIMIT $limit OFFSET $offset")
            : $this->db->get('movies', [], ['id' => 'DESC'], $limit, $offset);

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['budget'],
                $movie['age_limit'],
                $movie['release_date'],
                $movie['country'],
                $movie['duration'],
                $movie['preview'],
                $movie['created_at'],
                $movie['user_status'] ?? '0000',
                $movie['categories'] ?? [],
                $movie['actors'] ?? [],
                $movie['reviews'] ?? []
            );
        }, $movies);
    }

    public function count(int $categoryId = null): int
    {
        return $categoryId
            ? $this->db->query("SELECT COUNT(*) as count FROM movies m JOIN movies_categories mc ON m.id = mc.movie_id WHERE mc.category_id = $categoryId")[0]['count']
            : $this->db->query('SELECT COUNT(*) as count FROM movies')[0]['count'];
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

    public function getWatchedMovies(int $userId): array
    {
        $watchedMovies = $this->db->query('SELECT m.* FROM users_movies um JOIN movies m ON um.movie_id = m.id WHERE um.user_id = :userId AND SUBSTRING(um.data, 2, 1) = "1"', [
            'userId' => $userId,
        ]);

        return $this->getArray_map($watchedMovies);
    }

    public function getWatchlistMovies(int $userId): array
    {
        $watchlistMovies = $this->db->query('SELECT m.* FROM users_movies um JOIN movies m ON um.movie_id = m.id WHERE um.user_id = :userId AND SUBSTRING(um.data, 1, 1) = "1"', [
            'userId' => $userId,
        ]);

        return $this->getArray_map($watchlistMovies);
    }

    /**
     * @param array $watchedMovies
     * @return Movie[]
     */
    public function getArray_map(array $watchedMovies): array
    {
        return array_map(function ($movie) {
            $id = $movie['id'] ?? null;
            $name = $movie['name'] ?? null;
            $description = $movie['description'] ?? null;
            $budget = $movie['budget'] ?? null;
            $age_limit = $movie['age_limit'] ?? null;
            $release_date = $movie['realease_date'] ?? "1488";
            $country = $movie['country'] ?? null;
            $duration = $movie['duration'] ?? 111;
            $preview = $movie['preview'] ?? null;
            $created_at = $movie['created_at'] ?? null;
            $user_status = $movie['user_status'] ?? '0000';
            $categories = $movie['categories'] ?? [];
            $actors = $movie['actors'] ?? [];
            $reviews = $movie['reviews'] ?? [];

            return new Movie(
                $id,
                $name,
                $description,
                $budget,
                $age_limit,
                $release_date,
                $country,
                $duration,
                $preview,
                $created_at,
                $user_status,
                $categories,
                $actors,
                $reviews,
            );
        }, $watchedMovies);
    }

}
