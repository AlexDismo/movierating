<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Movie $movie
 * @var \App\Kernel\Storage\StorageInterface $storage
 * */
?>
    <style>.movie::before {background: url('<?php echo $storage->url($movie->preview()); ?>') no-repeat;}</style>

<?php $view->component('system/start'); ?>

    <main class="movie">
        <div class="movie-container">

            <!-- Logo left block -->

            <div class="movie-logo">

                <img src="<?php echo $storage->url($movie->preview()) ?>" alt="logo">

                <div class="movie-logo-buttons">
                    <button class="movie-logo-buttons-item" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-watching" d="M3 13C6.6 5 17.4 5 21 13" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="svg-icon-watching" d="M12 17C10.3431 17 9 15.6569 9 14C9 12.3431 10.3431 11 12 11C13.6569 11 15 12.3431 15 14C15 15.6569 13.6569 17 12 17Z" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-rate" d="M5 13L9 17L19 7" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-watchlist" d="M5 21V5C5 3.89543 5.89543 3 7 3H17C18.1046 3 19 3.89543 19 5V21L13.0815 17.1953C12.4227 16.7717 11.5773 16.7717 10.9185 17.1953L5 21Z" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-exit" d="M6.7583 17.2426L12.0009 12M12.0009 12L17.2435 6.75739M12.0009 12L6.7583 6.75739M12.0009 12L17.2435 17.2426" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

            </div>

            <!-- Content right block -->

            <div class="movie-content">

                <div class="movie-content-title">

                    <div class="movie-content-title__main">
                        <h2><span> <?php echo $movie->name() ?></span></h2>
                        <p>(2023)</p>
                    </div>

                    <div class="movie-content-title__genres">
                        <ul>
                            <?php foreach ($movie->categories() as $genre): ?>
                                <li><a href="#movie"><?php echo $genre ?></a></li>
                            <?php endforeach; ?>
                            <?php
                            $duration = $movie->duration();
                            $hours = substr($duration, 0, 1);
                            $minutes = substr($duration, 1);
                            $formattedDuration = $hours . ' hr ' . $minutes . ' min';
                            ?>
                            <li class="movie-content-title__genres-age"><a href="d"><p><?php echo $movie->age_limit()?>+</p></a></li>
                            <li><a href="d"><?php echo $formattedDuration ?></a></li>
                        </ul>
                    </div>

                    <div class="movie-content-description">
                        <p><?php echo $movie->description() ?> </div>

                    <div class="movie-content-info">
                        <h1>Movie Info</h1>
                        <div class="movie-content-info__item">
                            <p>Country</p>
                            <p><?php echo $movie->country() ?></p>
                        </div>
                        <div class="movie-content-info__item">
                            <p>Budget</p>
                            <p><?php echo $movie->budget() ?></p>
                        </div>
                        <div class="movie-content-info__item">
                            <p>Release Date</p>
                            <p>Nov 21, 2014</p>
                        </div>
                    </div>

                    <h1>Cast & Crew</h1>


                    <div class="movie-content-actors">
                        <?php foreach ($movie->actors() as $actor): ?>
                            <div class="movie-content-actors__item">
                                <div class="movie-content-actors__item-img"><img src="<?php echo $storage->url($actor['avatar']) ?>" alt="<?php echo $actor['name'] ?>"></div>
                                <p><?php echo $actor['name'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

        </div>
    </main>

<?php $view->component('system/end'); ?>