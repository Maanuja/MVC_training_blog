<?php session_start(); ?>
<?php $titled = 'DramaNote | Profile'; ?>
<?php $css = 'href="assets/css/account.css" rel="stylesheet"' ?>
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
<div class="container"><h2>Your Profile Page</h2></div>
<h2 class="pb-2 border-bottom"></h2>
<div class="btn-group-vertical">
  <button type="button" class="btn btn-primary"><a href="#identite">Profil Info</a></button>
  <button type="button" class="btn btn-primary"><a href="#">My Posts</a></button>
  <button type="button" class="btn btn-primary"><a href="#change">Change Info</a></button>
  <button type="button" class="btn btn-primary"><a href="#changemdp">Change Password</a></button>

</div>
<div class="container">
    <div id="identite">
      <h1>My infos:</h1>
      <table class="center">
          <tr>
            <th>LastName:</th>
            <td><?php echo $_SESSION['firstname'];?></td>
          </tr>
          <tr><th>firstname:</th>
              <td><?php echo $_SESSION['lastname'];?></td>
          </tr>
          <tr>
              <th>Mail:</th>
              <td><?php echo $_SESSION['mail'];?></td>
          </tr>
          <tr>
              <th>Numéro de télephone:</th>
              <td><?php echo $_SESSION['phone'];?></td>
          </tr>
      </table>
      <br>
    </div>

    <div id="change">

      <h1> CHANGER MES COORDONNEES :</h1>

      <a href="#">  </a>
      <form method="post" name="coor">
          <table class="center">
              <tr>
                  <th>Nom:</th>
                  <td><input type="text" name="newn" placeholder="NOM" required=""></td>
              </tr>
              <tr>
                  <th>Prénom:</th>
                  <td><input type="text" name="newpp" placeholder="PRENOM" required=""></td>
              </tr>
              <tr>
                  <th>Mail:</th>
                  <td><input type="text" name="newmail"  placeholder="pseudo@domain.com" required="">
                  </td>
              </tr>
              <tr>
                  <th>Numéro de télephone:</th>
                  <td><input type="text" name="newtel" placeholder="00.00.00.00.00" required=""></td>
              </tr>
              <tr>
                  <td><input type="reset" value="ANNULER"></td>
                  <td colspan="2"><input type="submit" name="NEWCORD" value="ENVOYER"></td>
          </tr>
          </table>
      </form>
  </div>

          <div id="changemdp">

              <h1> CHANGER MON MDP :</h1>

              <a href="#">  </a>
              <form method="post" name="cgmdp">
                  <table class="center">
                      <tr>
                          <th>Ancien mot de passe*:</th>
                          <td>
                              <div class="eye">
                                  <input type="password" name="oldmdp" placeholder="Ancien mdp " required="" id="password-field-old"><i class="fa fa-eye" id="pass-status-old" aria-hidden="true" onClick="oldmdp()"></i>
                              </div>
                          </td>
                      </tr>
                      <?php
                          if(isset($erreuromdp)){
                              echo $erreuromdp;
                          }
                      ?>
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

<?php $content = ob_get_clean(); ?>

<?php require('src/view/main.php'); ?>