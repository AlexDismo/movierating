<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Movie> $movies
 */
?>

<section class="homecontent">

    <div class="homecontent-container">

        <h3>Featured</h3>

        <div class="homecontent-cards">
            <div class="homecontent-cards-scroller">
                <div class="homecontent-list-container">
                    <div class="homecontent-list" id="homecontentList">

                        <?php foreach ($movies as $movie) { ?>
                            <?php $view->component('movie', ['movie' => $movie]); ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>


        <div class="scrollbar-container">
            <div class="scrollbar-thumb"></div>
        </div>

        <h3>Online</h3>

        <div class="homecontent-cards">
            <div class="homecontent-cards-scroller">
                <div class="homecontent-list-container">
                    <div class="homecontent-list" id="homecontentList">


                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>
                        <a href="/movie?id=1">
                            <div class="homecontent-cards__item">
                                <div class="homecontent-cards__item-img"><img alt="" src="assets/images/film2logo.png" /></div>
                                <h1>The Beekeeper</h1>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="scrollbar-container">
            <div class="scrollbar-thumb"></div>
        </div>

    </div>

    <div class="blur-section-3"></div>
    <div class="blur-section-4"></div>

</section>