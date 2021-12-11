<?php session_start();?>
<?php $titled = 'DramaNote | About Us'; ?>
<?php $css = 'id="color-scheme" href="assets/css/aboutus.css" rel="stylesheet"' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php    if (isset($_SESSION['mail'])) {    ?>
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
                    <div class="image" style="background-image: url(assets/images/dramas.jpg);">
                        <span class="bg-mobile" style="background-color: #A2D9CE ;"></span>
                    </div>
                    <div class="text">
                        <span class="bg-color" style="background-color: #A2D9CE ;"></span>
                        <div class="box-holder">
                            <h2>WHO AM I?</h2>
                            <p>Hi, This is Maanuja. I'm the creator of this website with the help of Bootstrap <i class="fa fa-heart"></i>!
                            I've been watching k-drama for years so I thought It will be nice to have my one k-drama website where every body can create contente about it! I need to add way more new features.. but I'll do it when I can :).</p>
                            </br>
                            <p>This is the beginning of an adventure</p>
                            <h3>After all, Drama is everything.</h3>
                            
                        </div>
                    </div>
                </section>
            </div>
        </main>
        
<?php $content = ob_get_clean(); ?>
<?php require('main.php'); ?>