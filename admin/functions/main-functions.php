<?php
    //--------------------------------------------
    //connexion de la base de données local
    //------------------------------------------

   /*  $dbhost = 'localhost';
    $dbname = 'rhema';
    $dbuser = 'root';
    $dbpswd = ''; */
    
    //--------------------------------------------
    //connexion de la base de données en ligne
    //------------------------------------------
   /*   $dbhost = '185.98.131.128';
     $dbname = 'rhema1369589';
     $dbuser = 'rhema1369589';
     $dbpswd = 'pkol3hkr00';

    try{
        $connexion = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
    }catch (PDOException $e){
            die("Erreur de connexion à la base de données, Merci");
    } */
    $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','root');

    function admin(){
        if(isset($_SESSION['admin'])){
            //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
            global $connexion;
            $a = [
                'email'  =>$_SESSION['admin'],
                'role'   =>'administrateur'
            ];

            $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
            $req = $connexion->prepare($sql);
            $req->execute($a);
            $exist = $req->rowCount();
            return $exist;
        }else{
            return 0;
        }
    }

    //fonction redacteur
    function redacteur(){
        if(isset($_SESSION['admin'])){
            //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
            global $connexion;
            $a = [
                'email'  =>$_SESSION['admin'],
                'role'   =>'redacteur'
            ];

            $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
            $req = $connexion->prepare($sql);
            $req->execute($a);
            $exist = $req->rowCount();
            return $exist;
        }else{
            return 0;
        }
    }
    
    function moderateur(){
        if(isset($_SESSION['admin'])){
            global $connexion;
            //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
            $a = [
                'email'  =>$_SESSION['admin'],
                'role'   =>'moderateur'
            ];

            $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
            $req = $connexion->prepare($sql);
            $req->execute($a);
            $exist = $req->rowCount();
            return $exist;
        }else{
            return 0;
        }
    }

    function pas_password(){
        //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
        global $connexion;
        $sql = "SELECT * FROM admins WHERE email= '{$_SESSION['admin']}' AND password = '0' ";
        $req= $connexion->prepare($sql);
        $req->execute();
        $exist = $req->rowCount();
        return $exist;
    }
?>