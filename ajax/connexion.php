<?php
session_start();
$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');

/**
 * function pour afficher ou creer la session
 * du dernière connexion de l'utilisateur
 */
function fetch_user_last_activity($id_membre, $connexion)
{
    $query = " SELECT * FROM membre_details WHERE id_membre = '$id_membre' ORDER BY derniere_activite DESC LIMIT 1";
    $statement = $connexion->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach($result as $row)
    {
        return $row->derniere_activite;
    }
}