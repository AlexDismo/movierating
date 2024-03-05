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
                    <h3 class="mt-3">Registration</h3>
                    <hr>
                </div>
                <form action="/register" method="post" class="register-form">
                    <div class="register-form-group">
                        <div class="register-form-floating">
                            <input
                                    type="text"
                                    class="register-form-control <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                                    id="name"
                                    name="name"
                                    placeholder="John Doe"
                            >
                            <label for="name">Name</label>
                            <?php if ($session->has('name')) { ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('name')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <div class="register-form-floating">
                            <input
                                    type="email"
                                    class="register-form-control <?php echo $session->has('email') ? 'is-invalid' : '' ?>"
                                    name="email"
                                    id="email"
                                    placeholder="name@example.com"
                            >
                            <label for="email">E-mail</label>
                            <?php if ($session->has('email')) { ?>
                                <div id="email" class="invalid-feedback">
                                    <?php echo $session->getFlash('email')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <div class="register-form-floating">
                            <input
                                    type="password"
                                    class="register-form-control <?php echo $session->has('password') ? 'is-invalid' : '' ?>"
                                    id="password"
                                    name="password"
                                    placeholder="*********"
                            >
                            <label for="password">Password</label>
                            <?php if ($session->has('password')) { ?>
                                <div id="password" class="invalid-feedback">
                                    <?php echo $session->getFlash('password')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="register-form-floating">
                            <input type="password" class="register-form-control" id="password_confirmation" name="password_confirmation" placeholder="*********">
                            <label for="password_confirmation">Confirmation</label>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <button class="register-btn">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $view->component('system/end'); ?>