<?php
function user_exist($email,$pseudo){
    global $connexion;
    $tab = [
        'email'   =>$email,
        'pseudo'  =>$pseudo
    ];
    $sql = "SELECT * FROM membre WHERE email =:email OR pseudo =:pseudo ";
    $req = $connexion->prepare($sql);
    $req->execute($tab);
    $exist = $req->rowCount($sql);
    return $exist;
}

function token($nom){
    $nbre = "AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn123456789";
    $token = substr(str_shuffle(str_repeat($nbre,30)),0,20);
    $token_vrai = $nom.$token;
    return $token_vrai;
}