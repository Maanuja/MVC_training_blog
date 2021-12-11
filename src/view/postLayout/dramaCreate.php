<?php session_start(); ?>
<?php $titled = 'DramaNote | CreatePost'; ?>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="index.php?route=post&action=create" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to create this post?');">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="25" minlength="150"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Select Image File: <p style="font-size:15px;"> .jpg, .jpeg, .png limite 2MB</p></label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="upload">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Send</button>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label" hidden>Id</label>
                        <input type="text" name="id" class="form-control" id="id" value="<?php echo $_SESSION['id'] ?>" hidden>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>
