<?php

// function post($titre,$description,$url,$auteur,$posted){

//     $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');

//     $p = [
//         'titre'  =>'$titre',
//         'description'  => '$description',
//         'url_youtub'   => '$url',
//         'auteur'       => '$auteur',
//         'poster'       => '$posted'
//     ];
//     $sql = "INSERT INTO article(titre,description,url_youtub,auteur,date_publier,poster)
//             VALUES(:titre,:description,auteur,NOW(),:posted)";
//     $req = $connexion->prepare($sql);
//     $req->execute($p);
//     $id = $connexion->lastInsertId();

//     header("Location:../accueil.php?page=publication&id=".$id);
    
            
// }

// function post_img($tmp_name, $extension){
//     $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
//     $id = $connexion->lastInsertId();
//     $tab = [
//         'id'  =>$id,
//         'image' => $id.$extension
//     ];

//     $sq = "UPDATE article SET image =:image WHERE id =:id";
//     $req = $connexion->prepare($sq);
//     $req->execute($tab);
//     move_uploaded_file($tmp_name, "images/Admin/functions".$id.$extension);

// }

//fonction pour verifier si l'url youtube existe déjà
function verif_Url_youtube($url){
    
        //verifier mail et mot de passe du Admin
        //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
        global $connexion;
        $array = [
            'url_youtub' => $url
        ];
        $sql = "SELECT * FROM article WHERE url_youtub = :url_youtub";
        $req = $connexion->prepare($sql);
        $req->execute($array);
    
        $exist_url = $req->rowCount();
        return $exist_url;
        //var_dump($exist);
}
