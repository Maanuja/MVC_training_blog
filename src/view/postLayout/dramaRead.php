<?php session_start(); 
    use App\repository\PostRepository;
?>
<?php $titled = 'DramaNote | CurrentDrama'; ?>

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
<div class="bg-light">
        <div class="container">
                    <?php
                    $postObjects = new PostRepository();
                    $posts = $postObjects->getPosts()->fetchAll();
                    $author =  $postObjects->getAuthor($post->getAuthorId());
                    ?> 
                    <div class="card-header"><?php echo $post->getTitle(); ?></div>
                    <div class="card-body">
                        <h4 class="card-title">By <?php echo ' '.$author->getLastname().' '.$author->getFirstname() ?></h4>
                        <p class="card-text"><?php echo $post->getContent();?></p>
                    </div>
        </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>
