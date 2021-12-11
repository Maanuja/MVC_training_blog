<?php session_start(); 
use App\repository\UserRepository;

    $userObject = new UserRepository();
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
<div class="container"><h1>Your Profile Page</h1></div>
<h2 class="pb-2 border-bottom"></h2>

<div class="container">
    <div class="btn-group-vertical">
      <button type="button" class="btn btn-primary"><a href="#identite">Profil </br> Info</a></button>
      <button type="button" class="btn btn-primary"><a href="#">My Posts</a></button>
      <button type="button" class="btn btn-primary"><a href="#changemdp">Change </br> Password</a></button>

    </div>
    <div id="identite">
      <h1>My infos:</h1>
      <table class="center">
          <tr>
            <th>LastName:</th>
            <td><?php //echo $_SESSION['firstname'];
            echo $user->getuFirstname()?></td>
          </tr>
          <tr><th>firstname:</th>
              <td><?php //echo $_SESSION['lastname'];
              echo $user->getuLastname();
              ?></td>
          </tr>
          <tr>
              <th>Mail:</th>
              <td><?php //echo $_SESSION['mail'];
              echo $user->getuEmail();?></td>
          </tr>
          <tr>
              <th>Numéro de télephone:</th>
              <td><?php //echo $_SESSION['phone'];
              echo $user->getuTelephone()?></td>
          </tr>
      </table>
      <br>
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
<div class="container">
    <section class="jumbo text-centertron">
        <h1>CREATE A POST</h1>	 
        <button class="btn btn-primary mb-3"><a href="index.php?route=create">POST</a></button>   
    </section>
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