<?php

  //preparer la requete
    $req = $connexion->query("SELECT * FROM article WHERE poster='1' ORDER BY date_publier DESC LIMIT 0,5");
    $art_musq = $connexion->query("SELECT * FROM article WHERE poster='1' ORDER BY date_publier DESC LIMIT 5,1");

    //affiche1
    $articles = $req->fetchAll(PDO::FETCH_OBJ); //affiche les articles avant les deux omers

    $articlesmusiq = $art_musq->fetchAll(PDO::FETCH_OBJ); //affiche les articles apres deux omers
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

    /*====================================================================== 
                            TRAITEMENT DE LA BIBLE
    ==========================================================================*/
    /**
     * requete pour afficher les types des livre */

    $bible = $connexion->query("SELECT DISTINCT type_liv FROM bible   ORDER BY id");
    $sql = $bible->fetchAll(PDO::FETCH_OBJ);

    /**
     * requete pour afficher les livres selon les types de livres
     */
    $livre = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv= '$type'   ORDER BY id");
    $reslivre = $bible->fetchAll(PDO::FETCH_OBJ);


    /**
     * requete pour afficher Tous les   livres grouper par type livre
     * Evangiles
     *  */

    $bible = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv ='Les Evangiles'  ORDER BY id DESC");
    $eva = $bible->fetchAll(PDO::FETCH_OBJ);

    /**
     * requete pour afficher Tous les   livres grouper par type livre
     * Actes des Apotres
     *  */

    $bible2 = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv ='Actes des Apotres'  ORDER BY id");
    $actes = $bible2->fetchAll(PDO::FETCH_OBJ); 
    
     /**
     * requete pour afficher Tous les   livres grouper par type livre
     * Epitres de paul
     *  */

    $bible3 = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv ='Epitres de Paul'  ORDER BY id");
    $epitres = $bible3->fetchAll(PDO::FETCH_OBJ);

    /**
     * requete pour afficher Tous les   livres grouper par type livre
     * Epitres de paul
     *  */

    $bible4 = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv ='Autres Epîtres'  ORDER BY id");
    $autres = $bible4->fetchAll(PDO::FETCH_OBJ);

    /**
     * requete pour afficher Tous les   livres grouper par type livre
     * Epitres de paul
     *  */

    $bible5 = $connexion->query("SELECT DISTINCT livre FROM bible WHERE type_liv ='Livre de la Révélation'  ORDER BY id");
    $revelat = $bible5->fetchAll(PDO::FETCH_OBJ);



   
    


    
  ?>