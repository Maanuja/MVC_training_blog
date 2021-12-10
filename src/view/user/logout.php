<?php
    session_start();
    // On détruit les variables de notre session
    unset($_SESSION['mail']);
    unset($_SESSION['mdp']);
    // On détruit notre session
    session_destroy ();
    //session_destroy();
    header('Location: index.php');
