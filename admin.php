<?php
 session_start();    
 require_once('connect.php');
 require_once('inc/head.php');
 include('inc/header.php');
 include('inc/section-1.php');
 if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    header("Location:login.php?error=role1");
 }if($_SESSION['role'] !== "admin"){
    header("Location:login.php?error=reservation1");
 }
 include('inc/main-admin.php');
 ?>
<button class="button" id="deconnection"><a  href="login.php?disconnect=ok">Se deconnecter</a></button>
<?php
    // script JS + fermeture du body et fin de page
    require_once('inc/end.php');
?>