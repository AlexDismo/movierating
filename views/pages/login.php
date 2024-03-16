<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('system/start'); ?>
    <main class="register" id="defaultForm">
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

<style>
    #bootstrapForm {
        display: none;
    }
    #toggleButton {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 100;
    }
</style>

    <main class="container" id="bootstrapForm">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Login</h3>
                <hr>
                <form action="/login" method="post">
                    <?php if ($session->has('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $session->getFlash('error') ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                placeholder="name@movierating.com"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                placeholder="password"
                        >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <button id="toggleButton">Bt alt</button>

<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var defaultForm = document.getElementById('defaultForm');
        var bootstrapForm = document.getElementById('bootstrapForm');
        var head = document.getElementsByTagName('head')[0];
        var link = document.getElementById('bootstrapLink');

        if (defaultForm.style.display === 'none') {
            defaultForm.style.display = 'block';
            bootstrapForm.style.display = 'none';
            if (link) {
                head.removeChild(link);
            }
        } else {
            defaultForm.style.display = 'none';
            bootstrapForm.style.display = 'block';
            if (!link) {
                link = document.createElement('link');
                link.id = 'bootstrapLink';
                link.rel = 'stylesheet';
                link.type = 'text/css';
                link.href = '/assets/css/bt/bootstrap.css';
                head.appendChild(link);
            }
        }
    });
</script>
<?php $view->component('system/end'); ?>


