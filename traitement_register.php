<?php 
session_start();
    require_once('connect.php');
    
 
    
    if($_POST['form-register']){
        if(!empty($_POST['nom_register'])){
            $usernom= trim($_POST['nom_register']);
        }else{
            header("Location:register.php?error=register2");
        }
        if(!empty($_POST['prenom_register'])){
            $userprenom= trim($_POST['prenom_register']);
        }else{
            header("Location:register.php?error=register2");
        }
        if(!empty($_POST['email_register'])){
            $email= trim($_POST['email_register']);
        }else{
            header("Location:register.php?error=register2");
        }
        if(!empty($_POST['password_register'])){
            $userpassword=trim($_POST['password_register']);
        }else{
            header("Location:register.php?error=register2");
        }
    
        /* Verifions qu'aucun utilisateur n'existe avec le meme email */
        $sql_verif = "SELECT COUNT(email) AS num FROM users WHERE email = 
        :email";
        $stmt = $conn->prepare($sql_verif);
        $stmt-> bindValue(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['num'] > 0){
            header("Location:register.php?error=register3");
            die();
        }
        /* Crypter le mot de passe*/ 
        $password_hash_options = [
            'cost' => 12,
        ];
        $password_hash = password_hash($userpassword, PASSWORD_BCRYPT,
        $password_hash_options);


        /* Preparons la creation de compte sur la BDD*/
        $sql_insert="INSERT INTO users(usernom, userprenom, email, userpassword) VALUES (:usernom, :userprenom, :email, :userpassword)";
        $stmt = $conn->prepare($sql_insert);

        $stmt->bindValue(':usernom', $usernom);
        $stmt->bindValue(':userprenom', $userprenom);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':userpassword', $password_hash);

        $result_insert = $stmt->execute();
        if($result_insert){
            header("Location:login.php?error=register4");
        }
    }else{
        header('Location:register.php?error=register1');
    }

/*register
ok=>1- recuperer les informations du formulaire register
ok=>2- verifications des informations de la BDD (pas d'email similaire)
ok=>3- info correct=>enregistrement du compte dans la BDD et connexion $_SESSION
ok=>4- info incorrect => redirection vers connexion.php?error=register
*/



?>

