<?php
session_start();
$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
//echo 'vous etes bien connectés';
// Enregistrement des données

               
/* $email = htmlentities(trim($_POST["email"]));
$pseudo = htmlentities(trim($_POST["email"]));
$pswd = htmlentities(trim($_POST["password"]));
$errors = [];

    /**
* verifier si le pseudo ou email existe dans la base


$tab = [
 'email'  =>$email,
'pseudo'  =>$pseudo,
'password'=>sha1($pswd)
 ];
    $sql = "SELECT * FROM membre WHERE (email=:email OR pseudo=:pseudo) AND password=:password";
    $req = $connexion->prepare($sql);
    $req->execute($tab);
    $rest = $req->rowCount($sql);

    if($rest){
        $errors['user'] = "Vous etes bien connectés";
        
    } */


    $sql = "SELECT * FROM membre WHERE email = ' ".$_POST["email"]." '  AND password = ' ".$_POST["password"]." '";
    $req = $connexion->query($sql);
    //$req->execute();
    $rest = $req->rowCount($sql);
    if($rest >0){
        $_SESSION['email'] = $_POST['email'];
        echo "success";
    }else{
        echo "fail";
    }
