<?php
// Doctype + balise head +ouverture du body
    require_once('inc/head.php');
   
    //    le body est ouvert
    include('inc/header.php');
    include('inc/section-1.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Restaurer votre mot de passe<h1>
            <p> Un e-mail vous sera envoyé comportant les instructions à suivre pour restaurer votre mot de pasee</p>
            <form action= "traitemnet-reset-password.php" method="post">
                <input type="text" name ="email" placeholder="Entrer votre e-mail" > 
                <input  type="submit" name = "reset-request-submit" value="Restaurer votre mot de passe" class="button" > 
            </form>
        </div>
    </div>
</div>
<?php
     // script JS + fermeture du body et fin de page
     require_once('inc/end.php');
?>