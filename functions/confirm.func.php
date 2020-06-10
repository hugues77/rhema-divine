<?php
function verif($pseudo,$code,$email){
    global $connexion;
    $tab = [
        'email'    =>$email,
        'pseudo'   =>$pseudo,
        'token'   =>$code
    ];
    $sql = "SELECT * FROM membre WHERE (email =:email OR pseudo =:pseudo) AND (token =:token)";
    $req = $connexion->prepare($sql);
    $req->execute($tab);
    $success = $req->rowCount($sql);
    return $success;
}

function token_zero($email,$pseudo){
    global $connexion;
    $tab = [
        "token"   =>'',
        "email"   =>$email,
        "pseudo"  =>$pseudo
    ];
    
    $sql = "UPDATE membre set token=:token WHERE email=:email OR pseudo=:pseudo ";
    $req = $connexion->prepare($sql);
    $res = $req->execute($tab);
    return $res;
}