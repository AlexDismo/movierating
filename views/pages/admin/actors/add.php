<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('system/start'); ?>
    <main class="admin">

        <div class="admin-container">

            <form action="/admin/actors/add" method="post" enctype="multipart/form-data" class="movie-form">

                <h1>Creating actor card</h1>

                <div class="movie-form-title form-block">
                    <input
                            type="text"
                            class="input <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                            id="name"
                            name="name"
                            placeholder=""
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
                    >
                    <label for="biography">Biography</label>
                    <?php if ($session->has('biography')) { ?>
                        <div id="biography" class="invalid-feedback">
                            <?php echo $session->getFlash('biography')[0] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-block">
                    <input class="input" type="file" name="image" id="image">
                    <label for="image" class="form-label">Avatar</label>
                </div>

                <div class="movie-form-buttons">
                    <button class="">Add</button>
                </div>

            </form>
        </div>
    </main>

<?php $view->component('system/end'); ?>
