<?php
    session_start();
    

    // Doctype + balise head +ouverture du body
    require_once('inc/head.php');
   
    //    le body est ouvert
    include('inc/header.php');
    $error = false;
    if(isset($_GET['error']) && !empty($_GET['error'])){
        if($_GET['error'] == "register1"){
            $error ='<p class="bg-danger text-white py-3">'. "Vous n'avez pas accés a la page traitement_register.php.".'</p>';
        }elseif($_GET['error'] == "register2"){
           $error='<p class="bg-danger text-white py-3">'."Merci de completer le formulaire en entier.".'</p>' ;
        }elseif($_GET['error'] == "register3"){
            $error='<p class="bg-danger text-white py-3">'."Un utilisateur porte déjà ce mail.".'</p>' ;
        }
    }
    include('inc/content/affichage_error.php');
    
    include('inc/content/section-creation-compte.php');
    include('inc/footer.php');



    // script JS + fermeture du body et fin de page
    require_once('inc/end.php');
?>
     