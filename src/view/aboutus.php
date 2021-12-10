<?php session_start();?>
<?php $titled = 'DramaNote | About Us'; ?>
<?php $css = 'id="color-scheme" href="assets/css/aboutus.css" rel="stylesheet"' ?>
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
        <main>
            <!-- <div class="page-loader">
                <div class="loader">Loading...</div>
            </div> -->
            <section class="jumbo text-centertron"></section>

            <div id="banner-wrapper">
				<div class="inner">
					<section id="banner" class="containerus">
						<p>One drama A day <br> keep the doctor<br>
						<h2><strong>AWAY</strong>.</h2></p>
					</section>
				</div>
            </div>
            <div class="container">
                <section class="features-content ">
                    <div class="image" style="background-image: url(assets/images/lunesurf.jpg);">
                        <span class="bg-mobile" style="background-color: #FFEFE2;"></span>
                    </div>
                    <div class="text">
                        <span class="bg-color" style="background-color: #FFEFE2;"></span>
                        <div class="box-holder">
                            <h2>WHO AM I?</h2>
                            <p>We're the cozy workshop place to be and the #1 provider in France. We believe that confort don't come with a price therfore, we've been working hard for years to build the best coffee Shop on earth. Our goal in to bring you high quality drink delivered with expertise, convenience, and warmth.</p>
                            <p>After all, Drama is everything.</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        
<?php $content = ob_get_clean(); ?>
<?php require('main.php'); ?>