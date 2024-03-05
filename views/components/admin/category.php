<?php
/**
 * @var \App\Models\Category $category
 */
?>

<div class="category-item">
    <div class="category-name"><?php echo $category->name() ?></div>
    <div class="category-actions">
        <a href="/admin/categories/update?id=<?php echo $category->id() ?>" class="category-action">Edit</a>
        <form action="/admin/categories/destroy" method="post" class="category-action">
            <input type="hidden" name="id" value="<?php echo $category->id() ?>">
            <button>Delete</button>
        </form>
    </div>
</div>