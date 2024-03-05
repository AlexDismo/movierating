<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Models\Category $category
 */
?>

<?php $view->component('system/start'); ?>
    <main>
        <div class="category-container">
            <h3 class="register-content-title">Update - <?php echo $category->name() ?></h3>
            <form action="/admin/categories/update" method="post" class="register-form">
                <input type="hidden" name="id" value="<?php echo $category->id() ?>">
                <div class="form-floating">
                    <input
                            type="text"
                            class="form-control <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="name"
                            value="<?php echo $category->name() ?>"
                            name="name"
                            placeholder="Category Name"
                    >
                    <label for="name">Name</label>
                    <?php if ($session->has('name')) { ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('name')[0] ?>
                        </div>
                    <?php } ?>
                </div>
                <button class="register-btn">Save</button>
            </form>
        </div>
    </main>

<?php $view->component('system/end'); ?>