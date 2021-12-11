<?php session_start(); 
use App\repository\UserRepository;
use App\repository\PostRepository;;

    $userObject = new UserRepository();
    $postObjects = new PostRepository();
    $posts = $postObjects->getPosts()->fetchAll();
    $user =  $userObject->getUser($_SESSION['mail']);
?>
<?php $titled = 'DramaNote | Profile'; ?>
<?php $css = 'href="assets/css/account.css" rel="stylesheet"' ?>
<?php ob_clean() ?>
<div class="text-end">
    <?php
    if (isset($_SESSION['mail'])) {
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
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Your Profile Page</h1>
          <p class="lead text-muted">Hello <?php echo $user->getuFirstname()?>,</br> Welcome to your Profile page! have fun editing your posts \°u°/</p>
          <p>
            <a href="#identite" class="btn btn-primary my-2">Profil Info</a>
            <a href="#mypost" class="btn btn-primary my-2">My Post</a>
            <a href="#changemdp" class="btn btn-primary my-2">Change Password</a>
            <a href="index.php?route=create" class="btn btn-primary my-2">Create a new POST</a>  
          </p>
        </div>
      </div>
    </section>
    <div id="identite">
      <h1>My infos:</h1>
      <table class="center">
          <tr>
            <th>LastName:</th>
            <td><?php echo $user->getuFirstname()?></td>
          </tr>
          <tr><th>firstname:</th>
              <td><?php echo $user->getuLastname();
              ?></td>
          </tr>
          <tr>
              <th>Mail:</th>
              <td><?php echo $user->getuEmail();?></td>
          </tr>
          <tr>
              <th>Numéro de télephone:</th>
              <td><?php echo $user->getuTelephone()?></td>
          </tr>
      </table>
      <br>
    </div>

    <div id="mypost">
      <div class="container">
            <div class="row mb-2">
                <?php
                    foreach( $posts as $post) {
                      if ($user->getuId()==$post['authorID']) {
                ?>
                <div class="col-md-6">
                <div class="card mb-6 box-shadow">
                    <img class="card-img-top"  alt="Thumbnail [100%x225]" style="height: 675px; width: 100%; display: block;" src="assets/images/posts/<?php echo $post['image']; ?>" data-holder-rendered="true">
                    <div class="card-body">
                        <h5 class="card-title"><?php  echo $post['title']; ?></h5>
                        <p class="card-text">
                            <?php 
                                $content= $post['content'];
                                $pos=strpos($content, ' ', 120);
                                echo substr($content,0,$pos)."...";
                            ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="index.php?route=post&action=read&id=<?php echo $post['id'];?>" class="nav-link px-2 text-secondary">View</a></button>
                            <?php 
                                if (isset($_SESSION['mail']) && $user->getuId()==$post['authorID']) {
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
                                    $hour = new \DateTime($post['createdAt']);

                                    echo $date->format('d/m/Y')." at ".$hour->format('H:i:s');
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                  </br>
                </div>
                <?php
                    }
                  }
                ?>
        </div>
      </div>
    </div>

    <div id="changemdp">

        <h1> CHANGER MON MDP :</h1>

        <a href="#">  </a>
        <form method="post" name="cgmdp">
            <table class="center">
              <input type="text" name="id" id="id" value="<?php echo $user->getuId(); ?>" hidden>
              <input type="text" name="pwd" id="pwd" value="<?php echo $user->getuPassword(); ?>" hidden>

                <tr>
                    <th>Ancien mot de passe*:</th>
                    <td>
                        <div class="eye">
                            <input type="password" name="oldmdp" placeholder="Ancien mdp " required="" id="password-field-old"><i class="fa fa-eye" id="pass-status-old" aria-hidden="true" onClick="oldmdp()"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Nouveau mot de passe*:</th>
                    <td>
                        <div class="eye">
                            <input type="password" name="newmdp" placeholder="Nouveau mdp " required="" id="password-field-new"><i class="fa fa-eye" id="pass-status-new" aria-hidden="true" onClick="newmdp()"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Confirmer mot de passe*:</th>
                    <td>
                        <div class="eye">
                            <input type="password" name="cofmdp" placeholder="Confirmer mdp " required="" id="password-field-cof"><i class="fa fa-eye" id="pass-status-cof" aria-hidden="true" onClick="cofmdp()"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                  <input type="submit" name="NEWMDP" value="ENVOYER">
                </td>
            </tr>
            </table>
        </form>
    </div>
  </div>
<script type="text/javascript">
            function oldmdp()
        {
          var passwordInput = document.getElementById('password-field-old');
          var passStatus = document.getElementById('pass-status-old');
         
          if (passwordInput.type == 'password'){
            passwordInput.type='text';
            passStatus.className='fa fa-eye-slash';
            
          }
          else{
            passwordInput.type='password';
            passStatus.className='fa fa-eye';
          }
        }
        </script>
        <script type="text/javascript">
        function newmdp()
        {
          var passwordInput = document.getElementById('password-field-new');
          var passStatus = document.getElementById('pass-status-new');
         
          if (passwordInput.type == 'password'){
            passwordInput.type='text';
            passStatus.className='fa fa-eye-slash';
            
          }
          else{
            passwordInput.type='password';
            passStatus.className='fa fa-eye';
          }
        }
        </script>
        <script type="text/javascript">
        function cofmdp()
        {
          var passwordInput = document.getElementById('password-field-cof');
          var passStatus = document.getElementById('pass-status-cof');
         
          if (passwordInput.type == 'password'){
            passwordInput.type='text';
            passStatus.className='fa fa-eye-slash';
            
          }
          else{
            passwordInput.type='password';
            passStatus.className='fa fa-eye';
          }
        }
</script>

<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>