<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Actor> $actors
 * @var array<\App\Models\Category> $categories
 * @var \App\Kernel\Storage\StorageInterface $storage
 */
?>

<?php $view->component('system/start'); ?>
    <main class="admin">

        <div class="admin-container">

            <form action="/admin/movies/add" method="post" enctype="multipart/form-data" class="movie-form">

                <h1>Creating movie post</h1>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="name"
                            name="name"
                            placeholder=""
                    >
                    <label for="name">Title</label>
                    <?php if ($session->has('name')) { ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('name')[0] ?>
                        </div>
                    <?php } ?>

                </div>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="country"
                            name="country"
                            placeholder=""
                    >
                    <label for="name">Country</label>
                </div>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="age_limit"
                            name="age_limit"
                            placeholder=""
                    >
                    <label for="name">AgeLimit</label>
                    <?php if ($session->has('name')) { ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('age_limit')[0] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="duration"
                            name="duration"
                            placeholder=""
                    >
                    <label for="name">Duration</label>
                    <?php if ($session->has('name')) { ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('duration')[0] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('release_date') ? 'is-invalid' : '' ?>"
                            id="release_date"
                            name="release_date"
                            placeholder=""
                    >
                    <label for="name">Release</label>
                    <?php if ($session->has('release_date')) { ?>
                        <div id="release_date" class="invalid-feedback">
                            <?php echo $session->getFlash('release_date')[0] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="budget"
                            name="budget"
                            placeholder=""
                    >
                    <label for="name">Budget</label>
                </div>


                <div class="movie-form-description form-block">
                    <textarea
                            style="height: 100px"
                            type="text"
                            class="input <?php echo $session->has('description') ? 'is-invalid' : '' ?>"
                            id="description"
                            name="description"
                            placeholder=""
                    ></textarea>
                    <label for="name">Description</label>
                    <?php if ($session->has('description')) { ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('description')[0] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-block">
                    <input class="input" type="file" name="image" id="image">
                    <label for="image" class="form-label">Preview</label>
                </div>

                <div class="movie-form-categories form-block">
                    <?php foreach ($categories as $category) { ?>
                        <div>
                            <input type="checkbox" id="category-<?php echo $category->id() ?>" name="categories[]" value="<?php echo $category->id() ?>">
                            <label for="category-<?php echo $category->id() ?>"><?php echo $category->name() ?></label>
                        </div>
                    <?php } ?>
                </div>

                <div class="movie-form-categories form-block">
                    <?php foreach ($actors as $actor) { ?>
                        <div style="display: flex; flex-direction: column">
                            <input type="checkbox" id="actor-<?php echo $actor->id() ?>" name="actors[]" value="<?php echo $actor->id() ?>">
                            <label for="actor-<?php echo $actor->id() ?>"><?php echo $actor->name() ?></label>
                            <div class="homecontent-cards__item" style="margin-top:10px">
                                <div class="homecontent-cards__item-img"><img alt="<?php echo $actor->name() ?>" src="<?php echo $storage->url($actor->avatar()) ?>" /></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="movie-form-buttons">
                    <button class="">Add</button>
                </div>

            </form>
        </div>
    </main>

<?php $view->component('system/end'); ?>
