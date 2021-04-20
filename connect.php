<?php
 setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
 $today = strftime("%A %d").''.ucfirst(strftime("%B %G"));
 
    define('MYSQL_HOST', 'ftp.cluster020.hosting.ovh.net');
    define('MYSQL_DATABASE', 'restaurant');
    define('MYSQL_USER', 'nouhamz');
    define('MYSQL_PASSWORD', '5YUHPDcpFBdD');
   
    try{
        $conn= new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // echo "connected successfully";
    }
    catch(PDOException $e){
        echo "connection failed: ".$e->getMessage();
    }

?>