<?php
//fonction pour inserer les couleurs background /table
function getColor($table, $colors){
    if(isset($colors[$table])){
        return $colors[$table];
        
    }else{
        return "primary";
    }
}
//fonction pour recuperer les commentaires postés
function getComments(){
    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
    global $connexion;
    $req = $connexion->query(
        "SELECT DISTINCT C.id, C.nom, C.prenom, C.email, C.commentaire,
                C.article_id, C.date_com,A.titre
        FROM comments C
        JOIN article A
        ON C.article_id = A.id
        WHERE C.comment_vue = '0'
        ORDER BY C.date_com ASC ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;
}

?>