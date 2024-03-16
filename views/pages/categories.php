<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Category> $categories
 */
?>

<?php $view->component('system/start'); ?>

    <main class="register-container">
        <div class="categories-container">
            <h3 class="solo-items-h1">Categories</h3>

            <div class="categories-cards">
                <?php foreach ($categories as $category) { ?>
                    <a href="/movies?category=<?php echo $category->id() ?>">
                        <div class="category-card">
                            <h1><?php echo $category->name() ?></h1>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </main>

<?php $view->component('system/end'); ?>