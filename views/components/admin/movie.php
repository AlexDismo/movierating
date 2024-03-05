<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Movie $movie
 */
?>


    <div class="admincontent-movies">
        <a href="/movie?id=<?php echo $movie->id() ?>">
        <div class="homecontent-cards__item">
            <div class="homecontent-cards__item-img"><img alt="<?php echo $movie->name() ?>" src="<?php echo $storage->url($movie->preview()) ?>" /></div>
            <h1><?php echo $movie->name() ?></h1>
        </div>

        <div class="category-actions">
            <a href="/admin/movies/update?id=<?php echo $movie->id() ?>" class="category-action">Edit</a>
            <form action="/admin/movies/destroy" method="post" class="category-action">
                <input type="hidden" name="id" value="<?php echo $movie->id() ?>">
                <button>Delete</button>
            </form>
        </div>
        </a>

    </div>






