<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Actor $actor
 */
?>
<a href="/actor?id=<?php echo $actor->id() ?>" >
    <div class="homecontent-cards__item">
        <div class="homecontent-cards__item-img"><img alt="<?php echo $actor->name() ?>" src="<?php echo $storage->url($actor->avatar()) ?>" /></div>
        <h1><?php echo $actor->name() ?></h1>
    </div>
</a>