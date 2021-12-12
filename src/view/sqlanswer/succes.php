<?php session_start(); ?>
<?php $titled = 'DramaNote | SUCESS'; ?>
<?php $css = '' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php
    if (isset($_SESSION['mail'])) {    ?>
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
<?php 
    if (isset($_GET['resquest']) && $_GET['resquest'] == 'created')
    {
        $sqlres ='<div class="correct">Le post a été créé!</div>';
    } if (isset($_GET['resquest']) && $_GET['resquest'] == 'deleted')
    {
        $sqlres ='<div class="correct">The post got deleted, you can now only see it in your profile!</div>';
    }
    if (isset($_GET['resquest']) && $_GET['resquest'] == 'updated')
    {
        $sqlres ='<div class="correct">Le post a été updated!</div>';
    }
    if (isset($_GET['resquest']) && $_GET['resquest'] == 'mdpchanged')
    {
        $sqlres ='<div class="correct">Your password has been changed !</div>';
    }
    if (isset($_GET['resquest']) && $_GET['resquest'] == 'deletedsee')
    {
        $sqlres ='<div class="correct">The post has been deleted by you! If you want it back create another one plz :(</div>';
    }
?>
<?php ob_start(); ?>
            <main class="px-3">
                <p class="lead">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content rounded-5 shadow">
                        <h1>
                            MSG:
                            <?= $sqlres ?>
                        </h1>
                        </div>
                    </div>
                </p>
            </main>
<?php $content = ob_get_clean(); ?>
<?php require('src/view/main.php'); ?>