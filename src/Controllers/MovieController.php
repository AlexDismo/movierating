<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\ActorService;
use App\Services\CategoryService;
use App\Services\MovieService;

class MovieController extends Controller
{
    private MovieService $service;

    public function create(): void
    {
        $categories = new CategoryService($this->db());

        $actors = new ActorService($this->db());

        $this->view('admin/movies/add', [
            'categories' => $categories->all(),
            'actors' => $actors->all(),
        ]);
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'duration'=> ['min:3', 'max:3'],
            'description' => ['required'],
            'categories' => ['required'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect('/admin/movies/add');
        }

        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('country'),
            $this->request()->input('release_date'),
            $this->request()->input('age_limit'),
            $this->request()->input('budget'),
            $this->request()->input('duration'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('categories'),
            $this->request()->input('actors')
        );

        $this->redirect('/admin');
    }

    public function profile(): void
    {
        $userId = $this->auth()->user()->id();

        $watchedMovies = $this->service()->getWatchedMovies($userId);
        $watchlistMovies = $this->service()->getWatchlistMovies($userId);

        $this->view('profile', [
            'watchedMovies' => $watchedMovies,
            'watchlistMovies' => $watchlistMovies
        ], "Profile - {$this->auth()->user()->name()}");
    }

    public function movies(): void
    {
        $page = $this->request()->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $categoryId = $this->request()->input('category');
        $totalMovies = $this->service()->count($categoryId);

        $this->view('movies', [
            'movies' => $this->service()->new($limit, $offset, $categoryId),
            'page' => $page,
            'totalMovies' => $totalMovies,
            'limit' => $limit
        ], 'Movies');
    }

    public function destroy(): void
    {
        $this->service()->destroy($this->request()->input('id'));

        $this->redirect('/admin');
    }

    public function edit(): void
    {
        $categories = new CategoryService($this->db());
        $actors = new ActorService($this->db());
        $movieService = new MovieService($this->db(), $this->auth());

        $movieId = $this->request()->input('id');
        $movieActorIds = $movieService->getActorIdsForMovie($movieId);

        $this->view('admin/movies/update', [
            'movie' => $movieService->find($movieId),
            'categories' => $categories->all(),
            'actors' => $actors->all(),
            'movieActorIds' => $movieActorIds,
        ]);
    }

    public function update(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['required'],
            'categories' => ['required'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect("/admin/movies/update?id={$this->request()->input('id')}");
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('name'),
            $this->request()->input('release_date'),
            $this->request()->input('country'),
            $this->request()->input('age_limit'),
            $this->request()->input('budget'),
            $this->request()->input('duration'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('categories'),
            $this->request()->input('actors')
        );

        $this->redirect('/admin');
    }

    public function show(): void
    {
        $movie = $this->service()->find($this->request()->input('id'));

        $this->view('movie', [
            'movie' => $movie
        ], "Movie - {$movie->name()}");
    }

    public function updateUserStatus(): void
    {
        $status = $this->request()->input('status');
        $movieId = $this->request()->input('movie_id');
        $this->service()->updateUserStatus($status, $movieId);
        $this->redirect("/movie?id={$movieId}");
    }

    private function service(): MovieService
    {
        if (! isset($this->service)) {
            $this->service = new MovieService($this->db(), $this->auth());
        }

        return $this->service;
    }

}
