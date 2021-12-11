
<?php session_start();

use App\repository\PostRepository;

?>

<?php $titled = 'DramaNote | UpdatePost'; ?>
<?php $css = '' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php if (isset($_SESSION['mail'])) {    ?>
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

        <div class="container">
            <?php 
                $postObjects = new PostRepository();
                $posts = $postObjects->getPosts()->fetchAll();
                $author =  $postObjects->getAuthor($post->getAuthorId());
                // var_dump($id);
                // var_dump($posts);
            ?>
            <form action="" class="row g-3" method="POST" onsubmit="return confirm('Do you really want to delete this post?');">
                <div class="col-md-6">
                    <label for="title" class="form-label">TiTLE</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $post->getTitle(); ?>">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-label">Post ID</label>
                    <input type="text" name="id" class="form-control" id="id" value="<?php echo $post->getId(); ?>">

                </div>
                <div class="col-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" placeholder="CONTENT ARTICLES"><?php echo $post->getContent(); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Created on </label>
                    <input type="text" name="createdAt" class="form-control" id="createdAt" value="<?php echo $post->getCreatedAt()->format('Y-m-d H:i:s'); ?>">
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Deleted on </label>
                    <input type="text" name="deletedAt" class="form-control" id="deletedAt" value="<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>
