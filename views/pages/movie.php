<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Movie $movie
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 * */
?>
    <style>.movie::before {background: url('<?php echo $storage->url($movie->preview()); ?>') no-repeat;}</style>

<?php $view->component('system/start'); ?>

    <main class="movie">
        <div class="movie-container">

            <!-- Logo left block -->

            <div class="movie-logo">

                <img src="<?php echo $storage->url($movie->preview()) ?>" alt="logo">

                <?php
                $userStatus = str_split($movie->user_status());
                ?>

                <form action="/updateUserStatus" method="post" id="userStatusForm" class="movie-logo-buttons">
                    <input type="hidden" name="movie_id" value="<?php echo $movie->id(); ?>">
                    <input type="hidden" name="status" id="userStatusInput" value="<?php echo implode('', $userStatus); ?>">
                    <button class="movie-logo-buttons-item <?php echo $userStatus[0] == '1' ? 'movie-logo-buttons-item-active-watching' : '' ?>" onclick="updateStatus(0)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-watching" d="M3 13C6.6 5 17.4 5 21 13" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="svg-icon-watching" d="M12 17C10.3431 17 9 15.6569 9 14C9 12.3431 10.3431 11 12 11C13.6569 11 15 12.3431 15 14C15 15.6569 13.6569 17 12 17Z" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item <?php echo $userStatus[1] == '1' ? 'movie-logo-buttons-item-active-rate' : '' ?>" onclick="updateStatus(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-rate" d="M5 13L9 17L19 7" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item <?php echo $userStatus[2] == '1' ? 'movie-logo-buttons-item-active-watchlist' : '' ?>" onclick="updateStatus(2)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-watchlist" d="M5 21V5C5 3.89543 5.89543 3 7 3H17C18.1046 3 19 3.89543 19 5V21L13.0815 17.1953C12.4227 16.7717 11.5773 16.7717 10.9185 17.1953L5 21Z" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="movie-logo-buttons-item <?php echo $userStatus[3] == '1' ? 'movie-logo-buttons-item-active-exit' : '' ?>" onclick="updateStatus(3)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="svg-icon-exit" d="M6.7583 17.2426L12.0009 12M12.0009 12L17.2435 6.75739M12.0009 12L6.7583 6.75739M12.0009 12L17.2435 17.2426" stroke="#A6A6A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>

            </div>

        <!-- Content right block -->

        <div class="movie-content">

            <div class="movie-content-title">

                <div class="movie-content-title__main">
                    <h2><span> <?php echo $movie->name() ?></span></h2>
                    <p>(<?php echo $movie->release_date()?>)</p>
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
                        <p><?php echo $movie->release_date()?></p>
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

            <?php if ($auth->check()) { ?>
                <form action="/reviews/add" method="post" class="movie-content-reviews">

                    <input type="hidden" value="<?php echo $movie->id() ?>" name="id">
                    <select
                            class="movie-content-reviews__item"
                            name="rating"
                            aria-label="Default select example"
                    >
                        <option selected>Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    <?php if ($session->has('rating')) { ?>
                        <div id="name" class="">
                            <?php echo $session->getFlash('rating')[0] ?>
                        </div>
                    <?php } ?>

                    <div class="">
                            <textarea
                                    class="movie-content-reviews__description <?php echo $session->has('comment') ? 'is-invalid' : '' ?>"
                                    name="comment"
                                    placeholder="State your opinion about the movie"
                            >

                            </textarea>
                        <?php if ($session->has('comment')) { ?>
                            <div id="name" class="invalid-feedback">
                                <?php echo $session->getFlash('comment')[0] ?>
                            </div>
                        <?php } ?>

                    </div>

                    <button class="movie-reviews-button">Post</button>
                </form>

            <?php } else { ?>
                <div class="movie-content-reviews" style="text-decoration: underline">
                    To leave a review, you need to <a style="border-left: 1px solid; padding: 2px" href="/login">Login</a>
                </div>
            <?php } ?>

            <div class="one-movie__reviews">
                <?php foreach ($movie->reviews() as $review) { ?>
                    <?php $view->component('review_card', ['review' => $review]) ?>
                <?php } ?>
            </div>

        </div>
        </div>

    </main>
    <script>
        function updateStatus(position) {
            var statusInput = document.getElementById('userStatusInput');
            var status = statusInput.value.split('');

            if (position === 1) {
                status[0] = '0';
            }

            status[position] = status[position] === '1' ? '0' : '1';
            statusInput.value = status.join('');
            document.getElementById('userStatusForm').submit();
        }
    </script>
<?php $view->component('system/end'); ?>