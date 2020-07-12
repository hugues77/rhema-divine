<div class="container mt-2">
    <h2>Les deux omers</h2>
    <small class="text-danger">Ce formulaire vous permet d'envoyer les posts concernants les deux omers, Attention le fichier ne doit pas depasser 2 Mo</small><hr>
    <?php
        if(isset($_POST['submit'])){
            $titre = htmlspecialchars(trim($_POST['titre']));
            $fichier = $_FILES['fichier']['name'];
            $fichierSize = $_FILES['fichier']['size'];
            $fichierTmp = $_FILES['fichier']['tmp_name'];
            $fichierError = $_FILES['fichier']['error'];
            $fichierType = $_FILES['fichier']['type'];

            $destination = "../images_omers/".$fichier;
            //-------------------------------------------
            //on verifie l'extension du fichier
            //---------------------------------------------
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $ext = strchr($fichier, '.');
            //$errors = [];
            if(empty($titre) || empty($fichier)){
               // $errors ['empty'] = "Tous les champs doivent etre remplis.merci ";
               $_SESSION['alert'] = "Tous les champs doivent etre remplis.merci";
               $_SESSION['alert_code'] = "error";
            }
            elseif($fichierError != 0){
                //$errors ['error'] = "Echec d'envoie du fichier dans le serveur. Réessayer";
                $_SESSION['alert'] = "Echec d'envoie du fichier dans le serveur. Réessayer";
                $_SESSION['alert_code'] = "error";
            }
            elseif($fichierSize > 2000000){
                //$errors ['size'] = "La taille du fichier est trop grande, compressez le svp";
                $_SESSION['alert'] = "La taille du fichier est trop grande, compressez le svp";
                $_SESSION['alert_code'] = "error";
            }

            else if(!in_array($ext,$extensions)){
                //$errors ['extension'] = "L'extension du fichier n'est pas autorisé; merci de le changer";
                $_SESSION['alert'] = "L'extension du fichier n'est pas autorisé; merci de le changer";
                $_SESSION['alert_code'] = "error";
            }

            /* if(!empty($errors)){
                foreach($errors as $error){
                    ?>
                    <div class="alert alert-danger"><?=$error ?></div>
                    <?php
                }
            } */
            else{
                $succes = "";
                 move_uploaded_file($fichierTmp,$destination);
                //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
                $sql = "INSERT INTO omers(nom,image)VALUES(?,?)";
                $req = $connexion->prepare($sql);
                $succes = $req->execute(array($titre,$fichier));
                if($succes){
                    ?>
                    <!-- <div class="alert alert-success">Le fichier est enregistrer avec succès. Merci</div> -->
                    
                    <?php
                        $_SESSION['alert'] = "Le fichier est enregistrer avec succès. Bravo!";
                        $_SESSION['alert_code'] = "success";
                }
            }
            
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre"><h4>Titre du Message</h4></label>
        <input id="titre" type="text" class="form-control" name="titre">
    </div>
    <h4 class="mt-2">Sélectionner le fichier </h4>
    <input type="file" name="fichier" id="real-file" hidden="hidden ">
    <button type="button" class="btn btn-outline-warning btn-lg mb-2" id="custom-button"><i class="fas fa-camera mr-2"></i>Choisir un fichier</button>
    <span class="mb-2" id="custom-text">Aucun fichier sélectionné</span><br>
    <button class="btn btn-primary rounded btn-lg" type="submit" name="submit">Poster le message</button>
    </form>

</div>