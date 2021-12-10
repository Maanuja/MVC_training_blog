<?php session_start(); ?>
<?php $titled = 'DramaNote | Contact'; ?>
<?php $css = ' href="assets/css/contact.css" rel="stylesheet"' ?>
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
            <div class="container">
                <form name="contactus" method="post">
                    <fieldset>
                        <legend>Nous Conctacter</legend>
                        <table id="contact-form">
                            <tr>
                                <td class="tdcontact">
                                    <input type="text" id="nom" name="nom"
                                    placeholder="Nom" required>
                                </td>
                                <td class="tdcontact">
                                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdcontact">
                                    <input type="text" id="email" name="email" placeholder="pseudo@domain.com" required>
                                </td>
                                <td class="tdcontact">
                                    <input type="text" name="tel" id="tel" placeholder="N° de télèphone" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <textarea name="message" rows="10" placeholder="Message" id="msg" required></textarea>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <button type="reset" class="btn btn-g me-2 btn-round">Reset</button>

                                    <!-- <input type="reset" value="ANNULER" > -->
                                </td>
                                <td>
                                    <!-- <input type="submit" name="validcon" value="ENVOYER" > -->
                                    <!-- onclick="return contact();" -->
                                    <button type="submit" class="btn btn-g btn-round">Send</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </main>
<?php $content = ob_get_clean(); ?>
<?php require('main.php'); ?>