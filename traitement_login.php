<?php
session_start();
require_once('connect.php');

if(isset($_POST['form-login'])){
   if(!empty($_POST['email_login'])){
      $email= trim($_POST['email_login']);
   }else{
      header("Location:login.php?error=login2");
   }
   if(!empty($_POST['password_login'])){
      $userpassword=trim($_POST['password_login']);
   }else{
      header("Location:login.php?error=login2");
   }

   $sql_login = "SELECT id, usernom, email, role, userpassword FROM users WHERE email = :email"; 
   $stmt = $conn->prepare($sql_login);

   $stmt->bindValue(':email', $email);
   $stmt->execute();
   
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if($user == false){
      header("Location:login.php?error=login3");
      die();
   }else{
      $password_check = password_verify($userpassword, $user['userpassword']);
      if($password_check == true){
         $_SESSION['user_id'] = $user['id'];
         $_SESSION['username'] = $user['usernom'];
         $_SESSION['role'] = $user['role'];
         $_SESSION['logged_in'] = time();
         if($_SESSION['role'] == "user"){
            header("Location: reservation.php");
            exit();
         }else if($_SESSION['role'] == "admin"){
            header("Location: admin.php");
            exit();
         }
        
        
        
      }else{
         header("Location:login.php?error=login4");
         die();
      }
   }

}else{
        header('Location:login.php?error=login1');
    }


   /*
LOGIN
1- recuperer les informations du formulaire 
2- verifications des informations de la BDD
3- info correct=>enregistrement du login sur $_SESSION
4- info incorrect => redirection vers creation.php?error=login
*/




?>