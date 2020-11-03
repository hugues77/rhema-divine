<?php
if(pas_password() === 0){
    //header("Location:index.php?page=dashboard");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 card mt-2 mb-2">
            <?php
            if(isset($_POST['submit'])){
               $password1 = htmlspecialchars(trim($_POST['pswd1'])); 
               $password2 = htmlspecialchars(trim($_POST['pswd2'])); 
               //variables du profil
               $fichier = $_FILES['fichier']['name'];
               $fichierSize = $_FILES['fichier']['size'];
               $fichierTmp = $_FILES['fichier']['tmp_name'];
               $fichierType = $_FILES['fichier']['type'];
               $fichierErr = $_FILES['fichier']['error'];
               //définir l'extension
               $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
               $ext = strchr($fichier, '.');
               $destinat = "../images/".$fichier;
               //$errors = [];

               if(empty($password1) || empty($password2) || empty($fichier)){
                   //$errors['empty'] = "Tous les champs doivent etre remplis svp";
                   $_SESSION['alert'] = "Tous les champs doivent etre remplis svp";
                   $_SESSION['alert_code'] = "error";
               }

               elseif($password2 != $password1){
                   //$errors['different'] = "Les deux mots de passe doivent etre identique. Merci";
                   $_SESSION['alert'] = "Les deux mots de passe doivent etre identique. Merci";
                   $_SESSION['alert_code'] = "error";
               }
               elseif($fichierErr != 0){
                //$errors['error'] = "Echec du chargement du fichier; Réessayer. Merci";
                $_SESSION['alert'] = "Echec du chargement du fichier; Réessayer. Merci";
                $_SESSION['alert_code'] = "error";
               }
               elseif($fichierSize > 2000000){
                //$errors['size'] = "Le fichier ne doit pas depasser la taille de 2 Mo. Merci";
                $_SESSION['alert'] = "Le fichier ne doit pas depasser la taille de 2 Mo. Merci";
                $_SESSION['alert_code'] = "error";
               }
               elseif(!in_array($ext,$extensions)){
               //$errors['type'] = "Le type du fichier n'est pas autorisé. Merci";
               $_SESSION['alert'] = "Le type du fichier n'est pas autorisé. Merci";
               $_SESSION['alert_code'] = "error";
               }

/*                if(!empty($errors)){
                   foreach($errors as $error){
                       ?>
                       <div class="alert alert-danger"><?=$error ?></div>
                       <?php
                   }

               } */
               else{

                //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
                move_uploaded_file($fichierTmp,$destinat);
                $p = [
                    'password'  =>sha1($password1),
                    'session'  => $_SESSION['admin'],
                    'profil'   => $fichier
                ];
                $sql = "UPDATE admins SET password =:password, profil=:profil WHERE email=:session";
                $req = $connexion->prepare($sql);
                $req->execute($p);
                header("Location:index.php?page=dashboard");
               }
            }
            ?>
            <div class="mt-2 text-center">
                <img src="../images/user-female.png" alt="Modérateur" class="text-center" width="160px">
            </div>
            <h4 class="text-center mt-2">Choisir mon mot de Passe</h4>
            <form action="" method="POST" class="form-group" enctype="multipart/form-data" >
                <input type="password"  class="form-control" name="pswd1" placeholder="Taper votre mot de passe">
                <input type="password"  class="form-control mt-2" name="pswd2" placeholder="Retaper votre mot de passe">
                <div class="text-center">
                    <h4 class="mt-2"> Choisir ma photo de profil</h4>
                    <!-- <label for="file" class="mt-2 file-form">
                        <h4> Choisir ma photo de profil</h4>
                        <i class="fas fa-camera fa-2x"></i>
                    </label> -->
                    <input type="file" name="fichier" id="real-file" hidden="hidden" >
                    <button class="btn btn-outline-warning " type="button" id="custom-button"><i class="fas fa-camera mr-2"></i>Choisir un fichier</button>
                    <span id="custom-text">Aucun fichier choisi</span>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary mt-2  btn-block"><i class="fas fa-user mr-2"></i>Connexion</button><br>     
               
            </form>
        </div>   
        <div class="col-md-3"></div>
    </div>
</div>
