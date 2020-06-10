<?php
    //--------------------------------------------
    //connexion de la base de données en ligne
    //------------------------------------------
    // $dbhost = '185.98.131.128';
    // $dbname = 'rhema1369589';
    // $dbuser = 'rhema1369589';
    // $dbpswd = 'pkol3hkr00';

    // try{
    //     $connexion = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
    // }catch (PDOException $e){
    //         die("Erreur de connexion à la base de données, Merci");
    // }

  //-------------------------------------------------
  //connexion à la base de données local  
  //-------------------------------------------------
  //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
  //$connexion = new PDO('mysql:host=185.98.131.128; dbname=rhema1369589','rhema1369589','pkol3hkr00');

  //preparer la requete
 $req = $connexion->query("SELECT * FROM article WHERE poster='1' ORDER BY date_publier DESC LIMIT 0,5");
 $art_musq = $connexion->query("SELECT * FROM article WHERE poster='1' ORDER BY date_publier DESC LIMIT 5,1");

    //affiche1
    $articles = $req->fetchAll(PDO::FETCH_OBJ);
    $articlesmusiq = $art_musq->fetchAll(PDO::FETCH_OBJ);
    //var_dump($articles);
    //executer la req
    
   //fonction choisir pour les deux omers

   $om = $connexion->query("SELECT * FROM omers ORDER BY date_publier DESC");
   $omers = $om->fetchObject();

  //fonction choisir par categorie slider gauche

    $requet = $connexion->query("SELECT * FROM categorie");
    $reps = $requet->fetchAll(PDO::FETCH_OBJ);
    
   //requete pour la categorie de Musique 

   $reqMus = $connexion->query("SELECT * FROM article WHERE categorie_article = 'Musique' ORDER BY RAND () LIMIT 0,12");
    $req1 = $reqMus->fetchAll(PDO::FETCH_OBJ);

    //requete pour la categorie de Predication

    $reqMus = $connexion->query("SELECT * FROM article WHERE categorie_article = 'Predication' ORDER BY RAND () LIMIT 0,12 ");
    $req2 = $reqMus->fetchAll(PDO::FETCH_OBJ);

      //requete pour la categorie de Cuisine

    $reqMus = $connexion->query("SELECT * FROM article WHERE categorie_article = 'Cuisine' ORDER BY RAND () LIMIT 0,12 ");
    $req3 = $reqMus->fetchAll(PDO::FETCH_OBJ);

    //requete pour la categorie de Deux omers

    $reqMus = $connexion->query("SELECT * FROM article WHERE categorie_article = 'Deux Omers' ORDER BY RAND () LIMIT 0,12 ");
    $req4 = $reqMus->fetchAll(PDO::FETCH_OBJ);

    //--------------------------------------------
    //requete pour afficher la colonne pour videos récentes/ slider
    //-----------------------------------------------------
    $reqVR = $connexion->query("SELECT * FROM article ORDER BY date_publier DESC LIMIT 0,10");
    $reqV = $reqVR->fetchAll(PDO::FETCH_OBJ);

    //--------------------------------------------
    //requete pour afficher videos aléatoire
    //-----------------------------------------------------
    $reqVAL = $connexion->query("SELECT * FROM article   ORDER BY RAND () DESC LIMIT 0,9");
    $rgA = $reqVAL->fetchAll(PDO::FETCH_OBJ);


    /**
     * afficher les informations du membre
     * ici on crée le profil en definissant sa session
     * très bien
     */
    // $profil = $connexion->query("SELECT * FROM membre");
    // $profilMembre = $profil->fetchAll(PDO::FETCH_OBJ);
    // $_SESSION['nom'] = $profilMembre->nom;
    // $_SESSION['prenom'] = $profilMembre->prenom;
    // $_SESSION['nom'] = $profilMembre->email;

    
  ?>