<?php
function getCommentsValid(){
    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
    global $connexion;
    $req = $connexion->query(
        "SELECT DISTINCT C.id, C.nom, C.prenom, C.email, C.commentaire,
                C.article_id, C.date_com,A.titre
        FROM comments C
        JOIN article A
        ON C.article_id = A.id
        WHERE C.comment_vue = '1' AND C.confirm = '0'
        ORDER BY C.date_com ASC ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;
}
