<?php session_start(); ?>
<?php use App\repository\PostRepository; ?>
<?php $titled = 'DramaNote | Dramas'; ?>
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
<section class="jumbo text-centertron"></section>
            <div class="album py-5 bg-light">
                <div class="container">
                    <?php
                        if (isset($_SESSION['mail'])) {
                            echo '<section class="jumbo text-centertron">
                            <h1>CREATE A POST</h1>	 
                            <button class="btn btn-primary mb-3"><a href="index.php?route=create">POST</a></button>   
                            </section>';
                        }
                    ?>
                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal">Peek a boo Drama</h1>
                        <p class="fs-5 text-muted">
                        한류(Hallyu ; Korean wave) is a word that refers to a Korean pop culture including K-drama, K-pop, and K-food that are well liked by foreigners.
                        Particularly, K-drama became popular in the early 2000s in countries not limited to Asia but also Middle East, Europe, and North and South America.
                        One of the famous ones are “Autumn in My Heart(가을동화, 2000)”, “Winter Sonata(겨울연가, 2002)”, “Dae Jang Geum(대장금, 2003)”, “My Love from the Star(별에서 온 그대, 2013)”, “Descendants of the Sun(태양의 후예, 2016)”.
                        Some of the reasons that Korean dramas are popular might be because of the story focused on family, beautiful background music, and/or beautiful Hanbok in the historical dramas.
                        </p>
                    </div>
                    <div class="row">
                        <?php
                            $postObjects = new PostRepository();
                            $posts = $postObjects->getPosts()->fetchAll();
                            // var_dump($posts);
                            foreach( $posts as $post) {
                                // echo $post['title'];
                                // $date = new \DateTime($post['createdAt']);
                                // echo $date->format('d/m/Y');

                                //appelle new sql for authorid with la class post et vu que c'est une array faut renommer post->postObject                    
                                // $authorname = $postObjects->getAuthor($post['authorID']);
                                // var_dump($authorname);
                                // $author =  $postObjects->getAuthor($id);
                        ?>
                        <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"  alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="" data-holder-rendered="true">
                            <div class="card-body">
                                <h5 class="card-title"><?php  echo $post['title']; ?></h5>
                                <p class="card-text">
                                    <?php 
                                        //show first 100 characters 
                                        $content= $post['content'];
                                        $pos=strpos($content, ' ', 120);
                                        echo substr($content,0,$pos)."...";
                                    ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="index.php?route=post&action=read&id=<?php echo $post['id'];?>" class="nav-link px-2 text-secondary">View</a></button>
                                    <?php 
                                        if (isset($_SESSION['mail']) && $_SESSION['id']==$post['authorID']) {
                                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">';
                                            echo '<a href="index.php?route=post&action=update&id=';
                                            echo $post['id'];
                                            echo '" class="nav-link px-2 text-secondary">Edit</a>';
                                            echo '</button>';
                                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">';
                                            echo '<a href="index.php?route=post&action=delete&id=';
                                            echo $post['id'];
                                            echo '" class="nav-link px-2 text-secondary">Delete</a>';
                                            echo '</button>';
                                        }
                                    ?>
                                    
                                    </div>
                                    <small class="text-muted">
                                        <?php
                                            $date = new \DateTime($post['createdAt']);
                                            //$hour = new \DateTime($post['createdAt']);

                                            echo $date->format('d/m/Y');//." at ".$hour->format('H:i:s');
                                        ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
<?php $content = ob_get_clean(); ?>

<?php require('main.php'); ?>
