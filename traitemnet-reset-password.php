<?php
if(isset($_POST["reset-request-submit"])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.mon lien/creat-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'connect.php';

    $userEmail = $_POST["email"];
    $sql = "DELETE FROM pwdReset WHERE  pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo"Une erreure est survenue !";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires  ) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo"Une erreure est survenue !";
        exit();
    }else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close();

    $to = $userEmail;

    $subject = "Restaurez votre mot de passe pour THE BEST";

    $message = '<p> nous avons reçu votre demande de restauration de mot de passe. Le lien suivant vous permettera d\'effectuer votre changement de mot de passe, si vous n\'avez effectué aucune demnade vous pouvez ignorer ce message </p>';
    $message .= '<p> Voici votre lien de restauration: <br>';
    $message .= '<a href = "' . $url . '">' . $url . '</a></p>';
    $headers = "From: THE BEST<nouha.menadjlia@hotmail.fr>\r\n";
    $headers .= "Reply to: nouha.menadjlia@hotmail.fr\r\n";
    $headers .= "Reply to: nouha.menadjlia@hotmail.fr\r\n";
 


}else{
    header("Location: login.php");
}