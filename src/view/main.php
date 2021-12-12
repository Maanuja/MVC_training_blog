<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <title>DramaNote</title> -->
        <title><?= $titled ?></title>

        <link href="assets/vendor/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/contact.css" rel="stylesheet">
        <link <?= $css ?> >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    </head>
    <body>
        <header class="p-3 bg-dark text-white">
            <nav>
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="assets/images/dramanote.png" 
                        alt="image"/>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="index.php?route=drama" class="nav-link px-2 text-white">Drama</a></li>
                    <li><a href="index.php?route=contact" class="nav-link px-2 text-white">Contact</a></li>
                    <li><a href="index.php?route=aboutus" class="nav-link px-2 text-white">About Me</a></li>
                </ul>


                    <?= $log ?>
                </div>
            </div>
            </nav>
        </header>
        <?= $content ?>
        <div class="bgcolor">
            <div class="container">
                <footer class="py-3 my-4">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                        <li class="nav-item"><a href="index.php?route=drama" class="nav-link px-2 text-muted">Drama</a></li>
                        <li class="nav-item"><a href="index.php?route=contact" class="nav-link px-2 text-muted">Contact</a></li>
                        <li class="nav-item"><a href="index.php?route=aboutus" class="nav-link px-2 text-muted">About Me</a></li>
                    </ul>
                    <div class="d-flex justify-content-between py-4 my-4">
                    <p>© 2021 Maanuja, All rights reserved.</p>
                        <ul class="list-unstyled d-flex">
                            <li class="ms-3"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="ms-3"><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="ms-3"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        </ul>  
                    </div>          
                </footer>
            </div>
        </div>
    </body>
</html>
