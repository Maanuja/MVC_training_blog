<?php session_start(); ?>
<?php $titled = 'DramaNote | Homepage'; ?>
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

        <main>
            <!-- <div class="page-loader">
                <div class="loader">Loading...</div>
            </div> -->
            <div class="p-5 mb-4 rounded-3">
                <div class="container-fluid py-5">
                    <section class="jumbo text-centertron">
                        <h1 class="display-5 fw-bold">DramaNote </h1>
                        <h2 class="display-6 fw-bold">Brings Happiness to your days.</h2>
                        <p class="col-md-8 fs-4">
                        This list contains all of the Korean dramas I have reviewed so far.
                        I have seen many more dramas, and I am always watching something new.
                        It is a continuously growing list, so be sure to check back!
                        A ratings explanation can be found at the bottom of the list.
                        </p>
                        <button class="btn btn-primary btn-lg" type="button"><a href="index.php?route=drama">DramaList</a></button>
                    </section>
                </div>
            </div>
        </main>

<?php $content = ob_get_clean(); ?>
<?php require('main.php'); ?>
   