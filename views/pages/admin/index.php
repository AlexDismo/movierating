<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Category> $categories
 * @var array<\App\Models\Movie> $movies
 * @var array<\App\Models\Actor> $actors
 */
?>

<?php $view->component('system/start'); ?>

    <main class="admin">
        <div class="admin-container">

            <h3 class="admin-title">Admin Panel</h3>

            <hr class="admin-divider">
            <div class="admin-header">
                <h4 class="admin-subtitle">Movies</h4>
                <a href="/admin/movies/add" class="admin-add-button">
                    <span>Add</span>
                </a>
            </div>
            <div class="admin-flexbox">
                <?php
                foreach ($movies as $movie) {
                    $view->component('admin/movie', ['movie' => $movie]);
                }
                ?>
            </div>

            <hr class="admin-divider">
            <div class="admin-header">
                <h4 class="admin-subtitle">Actor</h4>
                <a href="/admin/actors/add" class="admin-add-button">
                    <span>Add</span>
                </a>
            </div>
            <div class="admin-flexbox">
                <?php
                foreach ($actors as $actor) {
                    $view->component('admin/actor', ['actor' => $actor]);
                }
                ?>
            </div>

            <hr class="admin-divider">

            <div class="admin-header">
                <h4 class="admin-subtitle">Genres</h4>
                <a href="/admin/categories/add" class="admin-add-button">
                    <span>Add</span>
                </a>
            </div>

            <div class="admin-flexbox">
                <?php
                foreach ($categories as $category) {
                    $view->component('admin/category', ['category' => $category]);
                }
                ?>
            </div>

        </div>
    </main>

<?php $view->component('system/end'); ?>