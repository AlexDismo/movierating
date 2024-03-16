<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Models\Movie[] $watchedMovies
 * @var \App\Models\Movie[] $watchlistMovies
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 * */
?>

<?php $view->component('system/start'); ?>

    <main class="profile">

        <div class="profile-container">

            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Watched')">Watched Movies</button>
                <button class="tablinks" onclick="openTab(event, 'Watchlist')">Watchlist Movies</button>
            </div>

            <div id="Watched" class="tabcontent">
                <h1>Watched Movies</h1>
                <?php foreach ($watchedMovies as $movie): ?>
                    <?php $view->component('movie', ['movie' => $movie]) ?>
                <?php endforeach; ?>
            </div>

            <div id="Watchlist" class="tabcontent">
                <h1>Watchlist Movies</h1>
                <?php foreach ($watchlistMovies as $movie): ?>
                    <?php $view->component('movie', ['movie' => $movie]) ?>
                <?php endforeach; ?>
            </div>

        </div>
    </main>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

<?php $view->component('system/end'); ?>