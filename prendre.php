<?php
    session_start();
    include_once("db.inc.php");
    if(!isset($_SESSION['idLivreur']) || $_SESSION["userType"]!="LVR")
    {
        header("location:login");
        exit();
    }
    
    if(isset($_POST["prendre"])){
        $id_order=$_POST["id_order"];
        $query="UPDATE `tb_order` SET etat='En cours Liv.' WHERE ID_order=$id_order ";
        $result=mysqli_query($conx,$query);
        if($result){
            header("location:index");
            exit();
        }
    }else{
        header("location:index");
        exit();
    }