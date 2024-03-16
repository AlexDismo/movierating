<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
?>

<section class="poster">
    <div class="">
        <div class="poster-section">
            <div class="poster-info">

                <div class="poster-info-logo">
                    <img src="/assets/images/altlogo.png" alt="logo"/>
                </div>

                <ul class="poster-info-menu">
                    <li>Browse</li>
                    <li>|</li>
                    <li>Evaluate</li>
                    <li>|</li>
                    <li>Comment on</li>
                </ul>

            </div>

            <div class="poster-cards">
                <div class="poster-cards-item">
                    <img alt="" src="assets/images/testiconfilm.png"/>
                </div>
                <div class="poster-cards-item">
                    <img alt="" src="assets/images/testiconfilm.png"/>
                </div>
            </div>

            <?php if ($auth->check()) { ?>
                <a href="/best" type="button" class="poster-button">
                    <span>Best titles</span>
                </a>
            <?php } else { ?>
                <a href="/login" type="button" class="poster-button">
                    <span>Sign in</span>
                </a>
            <?php } ?>




        </div>
    </div>
</section>
