<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\ActorService;
use App\Services\CategoryService;
use App\Services\MovieService;

class AdminController extends Controller
{
    public function index(): void
    {
        $categories = new CategoryService($this->db());
        $movies = new MovieService($this->db(), $this->auth());
        $actors = new ActorService($this->db());

        $this->view('admin/index', [
            'categories' => $categories->all(),
            'movies' => $movies->all(),
            'actors' => $actors->all(),
        ]);
    }
}
