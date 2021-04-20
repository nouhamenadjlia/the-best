<?php
session_start();

// A realiser 
/*
1- verifier que lutilisateur n'est pas connecter (avec $_SESSION)
2- si connecter => redirection vers resservation.php
3- si erreur de login ou register => afficher une erreur login ou register  ($_GET)
4- si erreur d'acccés a restaurant => affichage erreur  restarant
*/


    // Doctype + balise head +ouverture du body
    require_once('inc/head.php');
   
    //    le body est ouvert
    include('inc/header.php');
    include('inc/section-1.php');
    include('inc/content/section-2.php');
    include('inc/content/section-3.php');
    include('inc/footer.php');



    // script JS + fermeture du body et fin de page
    require_once('inc/end.php');
?>
     
    
