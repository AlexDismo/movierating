<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Actor> $actors
 * @var int $page
 * @var int $totalActors
 * @var int $limit
 */
?>

<?php $view->component('system/start'); ?>

    <main class="register-container">
        <div class="actors-container">
            <h3 class="solo-items-h1">Actors</h3>

            <div class="actors-cards">
                <?php foreach ($actors as $actor) { ?>
                    <?php $view->component('actor', ['actor' => $actor]); ?>
                <?php } ?>
            </div>

            <div class="actors-pagination">
                <a href="?page=<?php echo max(1, $page - 1) ?>" class="prev" <?php if ($page == 1) echo 'onclick="event.preventDefault();"'; ?>>Previous</a>
                <span class="page-number"><?php echo $page ?></span>
                <a href="?page=<?php echo $page + 1 ?>" class="next" <?php if ($page * $limit >= $totalActors) echo 'onclick="event.preventDefault();"'; ?>>Next</a>
            </div>
        </div>
    </main>

<?php $view->component('system/end'); ?>