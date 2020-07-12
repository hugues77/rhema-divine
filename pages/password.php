<div class="row bg-inscription p-5">
        <div class="col-md-6 offset-3">
            <?php
                if(isset($_POST['submit'])){
                    $password1 = htmlspecialchars(trim($_POST['password1']));
                    $password2 = htmlspecialchars(trim($_POST['password2']));
                    $profil= $_FILES['profil'];
                     //verifier l'extension du fichier
                     $nomFichier = $_FILES['profil']['name'];
                     $typeFichier = $_FILES['profil']['type'];
                     $sizeFichier = $_FILES['profil']['size'];
                     $tmpFichier =  $_FILES['profil']['tmp_name'];
                     $errorFichier = $_FILES['profil']['error'];
                     $extensions = ['.png','.PNG','.jpg','.JPG','.jpeg','.JPEG','.gif','.GIF'];
                     $ext =strchr($nomFichier,'.');
                     $destination = "images/tchat/".$nomFichier;
                    //$errors = [];
                    if(empty($password1) || empty($password2) || empty($profil)){
                        //$errors['empty'] = "Veuillez remplir tous les champs svp";
                        $_SESSION['alert'] = "Veuillez remplir tous les champs svp";
                        $_SESSION['alert_code'] = "error";
                        
                    }
                    elseif($password1 != $password2){
                        //$errors['password'] = "Les deux mot de passe ne sont pas identiques, vérifier svp";
                        $_SESSION['alert'] = "Les deux mot de passe ne sont pas identiques, vérifier svp";
                        $_SESSION['alert_code'] = "error";
                    }
                    elseif(!in_array($ext,$extensions)){
                        //$errors['extension'] = "L'extension n'est pas autorisée";
                        $_SESSION['alert'] = "L'extension du fichier n'est pas autorisée";
                        $_SESSION['alert_code'] = "error";
                    }
                    elseif($errorFichier != 0){
                        //$errors['erreur'] = "Le téléchargement a échoué, merci de reessayer";
                        $_SESSION['alert'] = "Le téléchargement a échoué, merci de reessayer";
                        $_SESSION['alert_code'] = "error";
                    }
                    elseif($sizeFichier > 2000000){
                        //$errors['size'] = "La taille du fichier est trop volumeux";
                        $_SESSION['alert'] = "La taille du fichier est trop volumeux";
                        $_SESSION['alert_code'] = "error";
                    }
              

                   /*  if(!empty($errors)){
                        foreach($errors as $error){
                            ?>
                            <div class="alert alert-danger"><?=$error?></div>
                            <?php
                        }
                    } */
                    else{
                        //rediger l'enregistrement, sans oublier verifier l'extension du fichier
                        upload_pass($password1,$nomFichier);
                        move_uploaded_file($tmpFichier,$destination);
                        
                        ?>
                       <script>window.document.location="index.php?page=index";</script>";
                       <?php
                    }
                }

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="row no-gutters">
                    
                        <div class="col-md-5 bg-info">
                            <div class="mt-5 pl-5 pr-5 pt-5 ml-4" >
                                <img src="images/user-female.png" class="bg-white p-2 user_img_password rounded-circle"  alt="">
                            </div>
                            <input class="ml-2 mt-3" type="file" name="profil">
                        </div>
                        <div class="col-md-7">
                            <div class="form-group  p-5   text-light">         
                                <h3 class="mt-2 mb-2 text-dark mb-4">Choisir mot de passe</h3>
                                            
                                    <div class="mt-2">
                                        <input type="password"  class="form-control mt-2" name="password1" placeholder="Taper votre mot de passe">
                                    </div>
                                    <div class="">
                                        <input type="password"  class="form-control mt-2" name="password2" placeholder="Rétaper votre mot de passe">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <button type="submit" name="submit" class="btn btn-primary mt-2 btn-block ">Valider</button>
                                        </div> 
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>