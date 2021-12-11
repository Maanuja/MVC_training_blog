<?php session_start(); ?>
<?php $titled = 'DramaNote | Login'; ?>
<?php $css = '' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php
    if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
    ?>
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
                            <!-- <h5 class="modal-title">Modal title</h5> -->
                            <h2 class="fw-bold mb-0">Login now !</h2>
                            <button type="button" id="myBtn" class="btn-close" aria-label="Close" ></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form class="" action="index.php?route=login" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" name="mail" class="form-control" id="mail" placeholder="name@example.com">
                                    <label for="mail">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="mdp" class="form-control" id="mdp" placeholder="********">
                                    <label for="mdp">Password</label>
                                    <div class="modal-footer">
                                        <i class="fa fa-eye-slash" id="pass-status-mdpco" aria-hidden="true" onClick="mdp()"></i>
                                    </div>
                                </div>
                                <small class="text-muted">
                                    <?php
                                        if (isset($_GET['con']) && $_GET['con'] == 'non')
                                        {
                                            echo '<div class="erreur">Votre mot de passe ou Identifiant est incorrecte:( </div>';
                                        
                                        }
                                    ?>
                                </small>
                                <hr class="my-4">
                                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Connect</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </p>
            </main>
            <script type="text/javascript" src="assets/js/main.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('src/view/main.php'); ?>