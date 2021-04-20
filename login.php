<?php
    
    session_start();
   
    $error = false;
    if(isset($_GET['disconnect'] )&& !empty($_GET['disconnect'])){
        session_destroy();
        session_unset();
        $error="Vous vous etes deconnecter avec succés.";
    }
  


    // Doctype + balise head +ouverture du body
    require_once('inc/head.php');
   
    //    le body est ouvert
    include('inc/header.php');

    if(isset($_GET['error']) && !empty($_GET['error'])){
        if($_GET['error'] == "login1"){
            $error = '<p class="bg-danger text-white py-3">'."Vous n'avez pas accés a la page traitement_login.php.".'</p>';
        }elseif($_GET['error'] == "login2"){
           $error='<p class="bg-danger text-white py-3">'."Merci de completer le formulaire en entier.".'</p>' ;
        }elseif($_GET['error'] == "login3"){
            $error='<p class="bg-danger text-white py-3">'." Votre identifiant est inconnu.".'</p>' ;
        }elseif($_GET['error'] == "login4"){
            $error='<p class="bg-danger text-white py-3">'."Votre mot de passe est incorrect!.".'</p>' ;
        
        }elseif($_GET['error'] == "reservation1"){
            $error='<p class="bg-danger text-white py-3">'."Cette page est privée.".'</p>' ;
        }elseif($_GET['error'] == "register4"){
            $error='<p class="bg-success text-white py-3">'."Votre compte a bien été créé." .'</p>'; 
        }
       
    }
    include('inc/content/affichage_error.php');
    
    include('inc/content/section-connexion-compte.php');
    include('inc/footer.php');



    // script JS + fermeture du body et fin de page
    require_once('inc/end.php');
?>