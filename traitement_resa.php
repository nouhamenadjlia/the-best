
<?php
    session_start();
    require_once('connect.php');
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
        header("Location:login.php?error=reservation1");
    }
    

   

    /*REQUETS*/
    if(isset($_POST['reserver'])){
        // $sql_usernom = "SELECT usernom FROM users ";
        // $stmt = $conn->prepare($sql_usernom);
        // $stmt->execute();

        // $usernom = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql_insert="INSERT INTO reservation(usernom, nombre_resa, creneaux, date) VALUES ( :usernom, :nombre_resa, :creneaux,  :date)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(':usernom', $_SESSION['username']);
        $stmt->bindValue(':nombre_resa',  $_POST['nombre_resa']);
        $stmt->bindValue(':creneaux', $_POST['creneaux']);
        $stmt->bindValue(':date', $_POST['date']);
        $resa_insert = $stmt->execute();
        if($resa_insert){
            header('Location:reservation.php?resa_jour=ok');
        }else{
            header('Location:reservation.php?resa_jour=ko');
        }
    }else{

    }
   
    
/*
1- verifier la $_SESSION
2- si logon ok=>affichage de la page
3- si login ko =>redirection vers index.php?error=reservation
*/

// $req=$bdd->prepare('INSERT INTO reservation(fullname, phone, persons, date_reservation) VALUES(?, ?, ?, ?)');
// $req->execute(array($_POST['fullname'],$_POST['phone'],$_POST['persons'],$_POST['date_reservation']));
// // Redirection du visiteur vers la page de la reservation
// header('Location: reservation.php');
require_once('inc/end.php');
?>
