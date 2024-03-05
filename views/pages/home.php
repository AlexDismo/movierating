<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Movie> $movies
 */
?>

<?php $view->component('system/start'); ?>

    <main>
        <div class="">
            <?php $view->component('home/carousel'); ?>
            <?php $view->component('home/poster'); ?>
            <?php $view->component('home/homecontent', ['movies' => $movies]); ?>
        </div>
    </main>

<?php $view->component('system/end'); ?>