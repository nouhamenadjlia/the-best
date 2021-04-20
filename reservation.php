
 
<?php

    session_start();   
    require_once('connect.php'); 
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
        header("Location:login.php?error=reservation1");
    }
     /*ERORRS & MESSAGES*/
     $message = false;
     if(isset($_GET['resa_jour']) && $_GET['resa_jour'] =='ok'){
         $message = '<p>la resaervation a été ajouter avec succés.</p>';
     }else if(isset($_GET['resa_jour']) && $_GET['resa_jour'] == 'ko'){
 
         $message = '<p>Erreur d\'enregistrement de votre reservation.</p>';
     }

    // Doctype + balise head +ouverture du body
    require_once('inc/head.php');
   
    //    le body est ouvert
    include('inc/header.php');
    include('inc/section-1.php');
   
    
    
    ?>

<div id="page_resa">
<?php
 echo $message;
?>
    
    <form action="traitement_resa.php" method="POST" class="reservation-form">
        <div class="reservation-form-row">
        
            <select name="nombre_resa" id="">
                <option value="0" selected disabled>choisir le nombre de couverts</option>
                <option value="1">1 personne</option>
                <option value="2">2 personnes</option>
                <option value="3">3 personnes</option>
                <option value="4">4 personnes</option>
                <option value="5">5 personnes</option>
                <option value="6">6 personnes</option>
                <option value="7">7 personnes</option>
                <option value="8">8 personnes</option>
                <option value="9">9 personnes</option>
                <option value="10">10 personnes</option>
                   
            </select>
            <select name="date" id="">
                <option name = date value="0" selected disabled>choisir la date</option>
                    <?php
                        $IncludeToday = date("G") < 17;
                        for($i=($IncludeToday?0:1);$i<=7;$i++) {
                        $TargetDate = strftime(strtotime(date("Y-m-d") . " +{$i} day"));
                        print "<option value=\"" . date("Y-m-d", $TargetDate) . "\">" . strftime("%A %d %B %G", $TargetDate) . "</option>\n";
                        }
                    ?>
            </select>
            <select name="creneaux" id="">
                <option value="12:00">12.00</option>
                <option value="13:00">13.00</option>
                <option value="14:00">14.00</option>
                <option value="19:00">19.00</option>
                <option value="20:00">20.00</option>
                <option value="21:00">21.00</option>
                <option value="22:00">22.00</option>
            </select>
        
        </div>
        <input  type="submit" name="reserver" value="RESERVER UNE TABLE" class="button" >
        <button class="button" id="deconnection"><a  href="login.php?disconnect=ok">Se deconnecter</a></button>
    </form>
</div>

   
    <?php
    include('inc/footer.php');



    // script JS + fermeture du body et fin de page
    require_once('inc/end.php');
?>