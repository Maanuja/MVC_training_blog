<?php session_start();
use App\repository\PostRepository;

?>
    <!-- DramaNote | Dramas -->
<?php //$titled = ob_get_clean(); ?>

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
            <form action="" class="row g-3" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to update this  post?');">
                <div class="col-md-6">
                <!-- <input type="hidden" name'_METHOD' value="PUT"> -->
                    <label for="title" class="form-label">TiTLE</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $post->getTitle(); ?>">
                </div>
                <div class="col-md-6">
                    <!-- <label for="title" class="form-label">Post ID</label> -->
                    <input type="text" name="id" class="form-control" id="id" value="<?php echo $post->getId(); ?>" hidden>

                </div>
                <div class="col-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" placeholder="CONTENT ARTICLES" rows="15" minlength="150"><?php echo $post->getContent(); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Created on </label>
                    <input type="text" name="createdAt" class="form-control" id="createdAt" value="<?php echo $post->getCreatedAt()->format('Y-m-d H:i:s'); ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Update on </label>
                    <input type="text" name="updateAt" class="form-control" id="updateAt" value="<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>">
                </div>
                <?php if ($post->getDeletedAt()!=null){
                    echo '<div class="col-md-12">
                    <h4 for="date" class="form-label">Since this post got deleted on the  ';
                    echo $post->getDeletedAt()->format('Y-m-d');
                    echo ' you can\'t update it sorry...</h4></div>';
                ?>
                
                
                <?php 
                    echo'<div class="col-12"><button type="submit" class="btn btn-primary" disabled>Update</button></div>';
                } else{
                    echo '<div class="mb-3">
                            <label>Select Image File: <p style="font-size:15px;"> .jpg, .jpeg, .png limite 2MB</p></label>
                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="upload">
                        </div>';
                    echo'<div class="col-12"><button type="submit" class="btn btn-primary">Update</button></div>';
                }
                ?>
            </form>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>
