<?php
    session_start();
    include_once("db.inc.php");
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if(isset($_POST["login-submit-livreur"]))
    {
        $email= mysqli_real_escape_string($conx,$_POST["email"]);
        $pwd= mysqli_real_escape_string($conx,$_POST["pwd"]);

        if(empty($email) || empty($pwd)){
            header("location:login?form=empty");
            exit();
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("location:login?form=email");
            exit();
        }else{
            $query="SELECT * FROM livreurs WHERE email='".$email."'";
            $result=mysqli_query($conx,$query);
            if($result)
            {
                if(mysqli_num_rows($result) !=0){
                    while($row=mysqli_fetch_array($result))
                {
                    if($pwd!=$row["password"]){
                        header("location:login?form=wrongpwd");
                        exit();
                    }elseif($pwd==$row["password"]){
                            $_SESSION["idLivreur"]=$row["ID_livreur"];
                            $_SESSION["username"]=$row["name"];
                            $_SESSION["email"]=$row["email"];
                            $_SESSION["phone"]=$row["phone"];
                            $_SESSION["addresse"]=$row["addresse"];
                            $_SESSION["userType"]="LVR";
                            header("location:index");
                            exit();
                        
                    }else{
                        header("location:login?form=wrongpwd");
                        exit();
                    }
                }
                }else{
                      header("location:login?form=wrongpwd");
                        exit();
                }
                
            }
        }
    }else
    {
        header("location:login");
        exit();
    }
?>