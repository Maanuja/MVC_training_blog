<?php session_start(); ?>
<?php $titled = 'DramaNote | Sign In'; ?>
<?php $css = '' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php if (isset($_SESSION['mail'])) { ?>
        <button type="button" class="btn btn-outline-light me-2 btn-round"><a href="index.php?route=account">Account</a></button>
        <button type="submit" class="btn btn-g btn-round"><a href="index.php?route=logout">Log out</a></button>                    
    <?php
    }
    else {
    ?>
        <button type="button" class="btn btn-outline-light me-2 btn-round"><a href="index.php?route=login">Login</a></button>
        <button type="button" class="btn btn-g btn-round"><a href="index.php?route=signin">Sign-up</a></button>
    <?php
    }
    ?>
</div>
<?php $log = ob_get_clean() ?>
<?php ob_start(); ?>
            <main class="px-3">
                <p class="lead">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content rounded-5 shadow">
                            <div class="modal-header p-5 pb-4 border-bottom-0">
                                <h2 class="fw-bold mb-0">Sign Up !</h2>
                                <button type="button" id="myBtn" class="btn-close" aria-label="Close" ></button>
                            </div>
                            <div class="modal-body p-5 pt-0">
                                <form action="index.php?route=signin" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="firstname"class="form-control" id="firstname" placeholder="Mary" required>
                                        <label for="firstname">FirstName</label>
                                    </div><div class="form-floating mb-3">
                                        <input type="text" name="lastname"class="form-control" id="lastname" placeholder="Smith" required>
                                        <label for="lastname">LastName</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" name="mail" class="form-control" id="mail" placeholder="name@example.com" required>
                                        <label for="mail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" pattern="[0-9]{10}" name="tel" class="form-control" id="tel" placeholder="00.00.00.00.00" required>
                                        <label for="tel">Telephone number</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="mdp" class="form-control" id="mdp" placeholder="********" required>
                                        <label for="mdp">Password</label>
                                        <div class="modal-footer">
                                            <i class="fa fa-eye-slash" id="pass-status-mdpco" aria-hidden="true" onClick="mdp()"></i>
                                        </div>
                                    </div>
                                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                                    <hr class="my-4">
                                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </p>
            </main>
        <script type="text/javascript" src="assets/js/main.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('src/view/main.php'); ?>