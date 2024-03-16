<?php

use App\Controllers\ActorController;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Controllers\ReviewController;
use App\Kernel\Router\Route;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return [
    Route::get('/', [HomeController::class, 'index']),

    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class, 'register'], [GuestMiddleware::class]),

    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login'], [GuestMiddleware::class]),
    Route::post('/logout', [LoginController::class, 'logout']),

    Route::get('/admin', [AdminController::class, 'index'], [AdminMiddleware::class]),

    Route::get('/admin/categories/add', [CategoryController::class, 'create'], [AdminMiddleware::class]),
    Route::post('/admin/categories/add', [CategoryController::class, 'store'], [AdminMiddleware::class]),
    Route::post('/admin/categories/destroy', [CategoryController::class, 'destroy'], [AdminMiddleware::class]),
    Route::get('/admin/categories/update', [CategoryController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/categories/update', [CategoryController::class, 'update'], [AdminMiddleware::class]),

    Route::get('/admin/movies/add', [MovieController::class, 'create'], [AdminMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'store'], [AdminMiddleware::class]),
    Route::post('/admin/movies/destroy', [MovieController::class, 'destroy'], [AdminMiddleware::class]),
    Route::get('/admin/movies/update', [MovieController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/movies/update', [MovieController::class, 'update'], [AdminMiddleware::class]),
    Route::post('/updateUserStatus', [MovieController::class, 'updateUserStatus']),
    Route::get('/movie', [MovieController::class, 'show']),
    Route::get('/movies', [MovieController::class, 'movies']),

    Route::get('/admin/actors/add', [ActorController::class, 'create'], [AdminMiddleware::class]),
    Route::post('/admin/actors/add', [ActorController::class, 'store'], [AdminMiddleware::class]),
    Route::post('/admin/actors/destroy', [ActorController::class, 'destroy'], [AdminMiddleware::class]),
    Route::get('/admin/actors/update', [ActorController::class, 'edit'], [AdminMiddleware::class]),
    Route::post('/admin/actors/update', [ActorController::class, 'update'], [AdminMiddleware::class]),
    Route::get('/actor', [ActorController::class, 'show']),
    Route::get('/actors', [ActorController::class, 'actors']),

    Route::post('/reviews/add', [ReviewController::class, 'store']),
    Route::get('/categories', [CategoryController::class, 'categories']),

    Route::get('/profile', [MovieController::class, 'profile']),
];
