<?php
function upload_pass($password1,$nomFichier){
    global $connexion;
    $tab = [
        'password'  =>sha1($password1),
        'image'     =>$nomFichier,
        'email'     =>$_SESSION['email'],
        'pseudo'    =>$_SESSION['pseudo']
    ];
    $sql = "UPDATE membre set password=:password, image=:image WHERE email=:email OR pseudo=:pseudo";
    $req = $connexion->prepare($sql);
    $res = $req->execute($tab);
    return $res;
}

