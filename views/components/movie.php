<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Movie $movie
 */
?>
<a href="/movie?id=<?php echo $movie->id() ?>" >
    <div class="homecontent-cards__item">
        <div class="homecontent-cards__item-img"><img alt="<?php echo $movie->name() ?>" src="<?php echo $storage->url($movie->preview()) ?>" /></div>
        <h1><?php echo $movie->name() ?></h1>
    </div>
</a>

