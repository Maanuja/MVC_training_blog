<?php session_start(); ?>
<?php $titled = 'DramaNote | Profile'; ?>
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
<div class="container"><h2>Your Profile Page</h2></div>
<h2 class="pb-2 border-bottom"></h2>
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
        echo '<div class="container">Your login mail is '.$_SESSION['mail'].' and your password is '.$_SESSION['mdp'].'.</div>';
        echo $_SESSION['id'] ;
        echo '</br>';
        echo $_SESSION['firstname'];
        echo '</br>';
        echo $_SESSION['lastname'];
        echo '</br>';
        echo $_SESSION['mail'];
        echo '</br>';
        echo $_SESSION['phone'];
        echo '</br>';
        echo $_SESSION['mdp'];
    }
    else {
    echo "You are not logged! Don't comme here.";
    }
?>
<div class="container">
    <section class="jumbo text-centertron">
        <h1>CREATE A POST</h1>	 
        <button class="btn btn-primary mb-3"><a href="index.php?route=create">POST</a></button>   
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>