<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Movie> $movies
 * @var int $page
 * @var int $totalMovies
 * @var int $limit
 */
?>

<?php $view->component('system/start'); ?>

    <main class="register-container">
        <div class="movies-container">
            <h3 class="solo-items-h1">Movies</h3>

            <div class="movies-cards">
                <?php foreach ($movies as $movie) { ?>
                    <?php $view->component('movie', ['movie' => $movie]); ?>
                <?php } ?>
            </div>

            <div class="movies-pagination">
                <a href="?page=<?php echo max(1, $page - 1) ?>" class="prev" <?php if ($page == 1) echo 'onclick="event.preventDefault();"'; ?>>Previous</a>
                <span class="page-number"><?php echo $page ?></span>
                <a href="?page=<?php echo $page + 1 ?>" class="next" <?php if ($page * $limit >= $totalMovies) echo 'onclick="event.preventDefault();"'; ?>>Next</a>
            </div>
        </div>
    </main>

<?php $view->component('system/end'); ?>