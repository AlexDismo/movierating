<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Models\Actor $actor
 * @var \App\Kernel\Storage\StorageInterface $storage
 */
?>

<?php $view->component('system/start'); ?>
<main class="admin">

    <div class="admin-container">

        <form action="/admin/actors/update" method="post" enctype="multipart/form-data" class="movie-form">

            <h1>Editing movie post</h1>

            <input type="hidden" value="<?php echo $actor->id() ?>" name="id">

            <div class="movie-form-title form-block">
                <input
                        type="text"
                        class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                        id="name"
                        name="name"
                        placeholder=""
                        value="<?php echo $actor->name() ?>"
                >
                <label for="name">Name</label>
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
                        value="<?php echo $actor->country() ?>"
                >
                <label for="name">Country</label>
            </div>

            <div class="movie-form-title form-block">
                <input
                        type="text"
                        class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                        id="age"
                        name="age"
                        placeholder=""
                        value="<?php echo $actor->age() ?>"
                >
                <label for="name">Age</label>
                <?php if ($session->has('name')) { ?>
                    <div id="name" class="invalid-feedback">
                        <?php echo $session->getFlash('age')[0] ?>
                    </div>
                <?php } ?>
            </div>

            <div class="movie-form-title form-block">
                <input
                        type="text"
                        class="input <?php echo $session->has('biography') ? 'is-invalid' : '' ?>"
                        id="biography"
                        name="biography"
                        placeholder=""
                        value="<?php echo $actor->biography() ?>"
                >
                <label for="biography">Biography</label>
                <?php if ($session->has('biography')) { ?>
                    <div id="biography" class="invalid-feedback">
                        <?php echo $session->getFlash('biography')[0] ?>
                    </div>
                <?php } ?>
            </div>

            <img src="<?php echo $storage->url($actor->avatar()) ?>" alt="logo">

            <div class="form-block">
                <input class="input" type="file" name="image" id="image">
                <label for="image" class="form-label">Avatar</label>
            </div>

            <div class="movie-form-buttons">
                <button class="">Save</button>
            </div>

        </form>
    </div>
</main>

<?php $view->component('system/end'); ?>
