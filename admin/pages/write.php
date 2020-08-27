<div class="container">
<?php

    if(moderateur() == 1){
        header("Location:index.php?page=dashboard");
    }

    //require_once 'functions/write.func.php';
    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
    //on fait appel à tous es elements qui sont dans la categorie
    //pour que cela soit notre combobox
    $requet = $connexion->query("SELECT * FROM categorie");
    $reps = $requet->fetchAll(PDO::FETCH_OBJ);
    //var_dump($reps);
    //fin de appel aux listes de categorie
    if(isset($_POST['post'])){
        $titre = htmlspecialchars(trim($_POST['titre']));
        $description = htmlspecialchars(trim($_POST['description']));
        $url = htmlspecialchars(trim($_POST['url']));
        $auteur = htmlspecialchars(trim($_POST['auteur']));
        $categ  =$_POST['categorie'];
        //imput de nouveau nom image
        $nomFichier = htmlspecialchars(trim($_POST['nomFichier']));
        //ici on gere le chechbox, si on coche public=1, sinon c'est zero
        $posted = isset($_POST['public']) ? "1" : "0";
        //on veut gerer la selection de categorie
        $errors = [];
        $msg = "";
        $erreur = "";
        //$categorie = ['Predication','Musique','Cuisine'];
        //$categ = $categorie[$_POST['categorie']];
        //*********** cette condition c'est si on selectionner à la main sans database*/
        // if(!array_key_exists('categorie',$_POST) || isset($categorie[$_POST['categorie']])){
        //     $errors['handy'] = "La catégorie seléctionnés n'existe pas ";
        // }

        //---------------------------------
        //verifier si les champs sont vide
        //-------------------------------------
        if(empty($titre) || empty($description) || empty($url) || empty($auteur) || $categ ===""){
            $errors['empty'] = "veuillez remplir tous les champs ; merci";
        }

        if(verif_Url_youtube($url)){
            $errors['empty'] = "Cet article a été déjà publier ; merci d'en publier un autre ";
        }
          /**
           * /uploader image dans la base
           * verifier la taille de l'image ainsi que le nom
           */

            if(!empty($_FILES['fichier']['name']) || !empty($nomFichier)){ 
                
                $fileName = $_FILES['fichier']['name'];
                $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
                $extension = strchr($fileName,'.');
                
                //nouveau nom du fichier
                $nouveauNom = $_POST['nomFichier'].$extension;
                ///tester si le fichier est dans l'extension 
                if(!in_array($extension,$extensions)){
                    $errors['image'] = "cette image n'est pas valable,vérifier le type de fichier svp.";
                
                }
            } 

            if(!empty($errors)){ 
                    //session_start();
                    $_SESSION['inputs'] = $_POST;
            
        
                    foreach($errors as $error){
                        $_SESSION['alert'] = $error;
                        $_SESSION['alert_code'] = "error";
                         ?>
                        <!-- <div class=" mt-1 alert alert-danger"><br></div>  -->
                     <?php
                    }
                //fin code pour enregistrer article dans la bdd
        
                }
            else{
                

                    //exécuter l'enrégistrement de l'article ici
                    //requte pour inserer les données dans la bd
            
                    $sql = "INSERT INTO article(titre, description, categorie_article, url_youtub, auteur, poster) VALUES(?, ?, ?, ?, ?, ?)";
                    $req = $connexion->prepare($sql);
                    $res = $req->execute(array( $titre,$description,$categ,$url,$auteur,$posted));
                    $id = $connexion->lastInsertId();
            
                    $msg = "Vous avez envoyé l'article avec l'image par defaut. Merci";
                    
                    //--------------------------------------------
                    //traitement de upload du fichier, vu que il reste le format
                    //------------------------------------------------
                    if(!empty($_FILES['fichier']['name'])){
                        if($nomFichier === ""){
                            //$_SESSION['inputs'] = $_POST;
                            $erreur = "vous avez oublié de changer le nom de l'image. Merci";
                        }
                        else{
                    
                        $fileName = $_FILES['fichier']['name'];
                        $fileTmpName = $_FILES['fichier']['tmp_name'];
                        $fileSize = $_FILES['fichier']['size'];
                        $fileError = $_FILES['fichier']['error'];
                        $fileType = $_FILES['fichier']['type'];
                        $fileDest = "../images/".$nouveauNom;

                            if($fileError === 0){
                                if($fileSize < 2000000){

                                    $isMove = move_uploaded_file($fileTmpName, $fileDest);
                                    
                                    if($isMove){
                                        $msg ="Article enregistrer avec un nouveau nom du fichier, Très bien";
                                        //------------------------------------
                                        //Modifier image par defeaut dans la BDD, l'image uploader
                                        //-----------------------------------------
                                        
                                        $tab = [
                                            'id'    =>$id,
                                            'image' =>$nouveauNom
                                        ];
                                        $sq = "UPDATE article SET image =:image WHERE id =:id";
                                        $sol = $connexion->prepare($sq);
                                        $hand = $sol->execute($tab);
                                        //    if($hand){
                                        //$errors['test1'] = "le fichier est bien été sauvegarder dans la base, Merci";
                                        //    }
                                    }

                                
                                
                                }else{
                                    $msg = "vérifier la taille de votre fichier svp";
                                }
                                
                            }else{
                                $erreur = " Erreur lors de téléchargement du fichier, Reessayer";
                            }
                    }

                    }
                    
                }
            
                 //afficher les erreurs en haut
       
                 if($msg){ 
                    $_SESSION['alert'] = $msg ;
                    $_SESSION['alert_code'] = "success";
                    ?>
                    <!-- <div class="mt-1 alert alert-success"></div> -->
                    <?php
                }
                if($erreur){
                    $_SESSION['alert'] = $erreur ;
                    $_SESSION['alert_code'] = "error";
                    ?>
                   <!--  <div class="mt-1 alert alert-danger"></div> -->
                    <?php

                }
                
                    
    }

    
?>
    <h2 class="text-center mt-2 ">Poster Un article</h2>
    <form class="" action="" method="POST" enctype="multipart/form-data">
        <div class="">
            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?= isset($_SESSION['inputs']['titre'])? $_SESSION['inputs']['titre']  : '';?>">
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="url">url youtube</label>
                    <input type="text" name="url" id="url" class="form-control" value="<?= isset($_SESSION['inputs']['url'])? $_SESSION['inputs']['url']  : '';?>">
                </div>
                <div class="col-md-4 form-group ">
                    <label for="auteur">Auteur Article</label>
                    <input type="text" name="auteur" id="auteur" class="form-control" value="<?= isset($_SESSION['inputs']['auteur'])? $_SESSION['inputs']['auteur']  : '';?>">
                </div>
                <div class="col-md-4 form-group">    
                    <label class="" for="categ">Catégorie Article</label>
                    <select name="categorie" class="custom-select" id="categ">
                        <option value="">Choisir...</option>
                        <?php foreach($reps as $rep){
                            $categorie = $rep->lib_categ ;?>
                            <option value="<?=$categorie ?>"><?= $categorie?></option> 
                            <?php
                        }?> 
                                
                    </select>   
                </div>
            </div>
            <div class="form-group">
                <label for="titre">Déscription de l'article</label>
                <textarea type="text" name="description" cols=""  rows="5" class="form-control"><?= isset($_SESSION['inputs']['description'])? $_SESSION['inputs']['description']  : '';?>
                </textarea>
            </div>
            <div class="upload form-group">
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="">Sélectionnez des images à charger :</h5>
                    
                        <input type="text" class="form-control" name="nomFichier" placeholder="Entrer le nouveau nom du fichier">
                    </div>
                    <div class="col-md-6">
                        <h5 class="">Sélectionner le fichier </h5>
                        <input type="file" name="fichier" id="real-file" hidden="hidden ">
                        <button type="button" class="btn btn-outline-warning btn-lg mb-2" id="custom-button"><i class="fas fa-camera mr-2"></i>Choisir un fichier</button>
                        <span class="mb-2" id="custom-text">Aucun fichier sélectionné</span><br>
                    </div>
                </div>
            </div>
            <hr>
           
            <div class="row">
                <div class="col-md-10">
                    <div class="form-check">
                        <input type="checkbox" name="public" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Public / Privé</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary  btn-block" name="post">Publier</button>
                </div>
            </div>
        </div>
    </form>
</div>
