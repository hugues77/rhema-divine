<?php
session_start();
//--------------------------------------------
//connexion de la base de données en ligne
//------------------------------------------
    $dbhost = '185.98.131.128';
    $dbname = 'rhema1369589';
    $dbuser = 'rhema1369589';
   $dbpswd = 'pkol3hkr00';

 try{
      $connexion = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
  }catch (PDOException $e){
          die("Erreur de connexion à la base de données, Merci de reessayer");
   }  
 
//$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','root');

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