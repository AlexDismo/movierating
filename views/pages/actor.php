<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Actor $actor
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 * */
?>
    <style>.movie::before {background: url('<?php echo $storage->url($actor->avatar()); ?>') no-repeat;}</style>

<?php $view->component('system/start'); ?>

    <main class="movie">
        <div class="movie-container">

            <!-- Logo left block -->

            <div class="movie-logo">

                <img src="<?php echo $storage->url($actor->avatar()) ?>" alt="logo">


                <form action="/updateUserStatus" method="post" id="userStatusForm" class="movie-logo-buttons">
                    <input type="hidden" name="movie_id" value="<?php echo $actor->id(); ?>">
                </form>

            </div>

            <!-- Content right block -->

            <div class="movie-content">

                <div class="movie-content-title">

                    <div class="movie-content-title__main">
                        <h2><span> <?php echo $actor->name() ?></span></h2>
                    </div>

                    <div class="movie-content-title__genres">
                        <ul>
                            <li class="movie-content-title__genres-age"><a href="d"><p><?php echo $actor->age()?> y.o.</p></a></li>
                        </ul>
                    </div>

                    <div class="movie-content-description">
                        <p><?php echo $actor->biography() ?> </div>

                    <div class="movie-content-info">
                        <h1>Movie Info</h1>
                        <div class="movie-content-info__item">
                            <p>Country</p>
                            <p><?php echo $actor->country() ?></p>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </main>

<?php $view->component('system/end'); ?>