<?php
require_once 'connexion.php';

$query = "UPDATE membre_details SET derniere_activite = NOW() WHERE id_membre_details = ' ".$_SESSION['id_membre_details']." ' ";
$statement = $connexion->prepare($query);
$statement->execute();