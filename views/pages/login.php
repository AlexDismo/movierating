<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('system/start'); ?>
    <main class="register">
        <div class="register-container">
            <div class="register-content">
                <div class="register-content-title">
                    <h3 class="">Login</h3>
                    <hr>
                </div>
                <form action="/login" method="post" class="register-form">
                    <?php if ($session->has('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $session->getFlash('error') ?>
                        </div>
                    <?php } ?>
                    <div class="register-form-group">
                        <div class="register-form-floating">
                            <input
                                    type="email"
                                    class="register-form-control"
                                    name="email"
                                    id="floatingInput"
                                    placeholder="name@movierating.com"
                            >
                            <label for="floatingInput">E-mail</label>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <div class="register-form-floating">
                            <input
                                    type="password"
                                    name="password"
                                    class="register-form-control"
                                    id="floatingPassword"
                                    placeholder="password"
                            >
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <button class="register-btn" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $view->component('system/end'); ?>