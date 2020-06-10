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
