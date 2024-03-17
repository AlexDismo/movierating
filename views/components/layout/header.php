<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>

<header class="header d-flex align-items-center">

    <div class="header-container">

            <div class="header-block-left">

                <!-- Logo left block -->
                <a class="header-logo" href="/">
                    <img src="/assets/images/mainlogo.svg" alt="logo"/>
                </a>


                <!-- Header menu -->
                <div class='header-menu'>
                    <ul>
                        <li>
                            <a href="/">
                                <span>Best</span>
                            </a>
                        </li>

                        <li>
                            <a href="/categories">
                                <span>Genres</span>
                            </a>
                        </li>

                        <li>
                            <a href="/actors">
                                <span>Actors</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>



            <!-- Right block-->
            <div class="header-block-right">

                <!-- Search -->
                <div class="header-search">
                    <form action="/search" method="get">
                        <button type="submit" class="header-search__btn">
                            <img src="/assets/images/tabler_search.png" alt="search">
                        </button>
                        <input type="text" name="query" placeholder="Search" class="header-search__input">
                    </form>
                </div>

                <div class="">
                    <?php if ($auth->check()) { ?>
                        <div class="header-status">
                            <div>
                                <a href="/profile"><p><?php echo $user->name() ?></p></a>
                            </div>
                            <form action="/logout" method="post">
                                <button class="header-btn">
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <a href="/login" type="button" class="header-btn">
                            <span>Sign in</span>
                        </a>
                    <?php } ?>
                </div>

            </div>

    </div>
</header>