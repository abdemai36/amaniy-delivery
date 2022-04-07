<?php

     $host="localhost";
    $user="amaniyco_amaniy_user";
    $password="w@UA)uizMdt6";
    $db_name="amaniyco_amaniy";

    $conx=mysqli_connect($host,$user,$password,$db_name);
    
    /* Modification du jeu de résultats en utf8mb4 */
    mysqli_set_charset($conx, "utf8");
    
    if(!$conx){
        die("Connection faild".mysqli_connect_error());
        exit();
    }