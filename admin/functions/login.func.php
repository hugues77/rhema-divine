<?php

function is_admin($email,$password){

/**
 *  //verifier mail et mot de passe du Admin
 * $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
       
 */
        global $connexion;
        $array = [
            'email' => $email,
            'password' => sha1($password)
        ];
        $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
        $req = $connexion->prepare($sql);
        $req->execute($array);
    
        $exist = $req->rowCount($sql);
        return $exist;
        //var_dump($exist);
}