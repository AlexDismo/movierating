<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Actor $actor
 */
?>


<div class="admincontent-movies">
    <a href="/movie?id=<?php echo $actor->id() ?>">
        <div class="homecontent-cards__item">
            <div class="homecontent-cards__item-img"><img alt="<?php echo $actor->name() ?>" src="<?php echo $storage->url($actor->avatar()) ?>" /></div>
            <h1><?php echo $actor->name() ?></h1>
        </div>

        <div class="category-actions">
            <a href="/admin/actors/update?id=<?php echo $actor->id() ?>" class="category-action">Edit</a>
            <form action="/admin/actors/destroy" method="post" class="category-action">
                <input type="hidden" name="id" value="<?php echo $actor->id() ?>">
                <button>Delete</button>
            </form>
        </div>
    </a>

</div>






