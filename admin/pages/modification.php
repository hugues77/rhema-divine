<?php


//connexion à la base de données
    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
    //-------------------------------------------------------------------
    //on fait appel à tous les elements qui sont dans la table article
    //--------------------------------------------------------------------
$reqX = $connexion->query("SELECT DISTINCT *
                 FROM article   WHERE id = '{$_GET['id']}' ");
//Quand on veut afficher un seul résultat, ol l'affiche avec fetchobject()
//sinon s'il s'agit des plusieurs, on utilise fetchAll

$result = $reqX->fetchObject();
//var_dump($result);

if($result == false){
    header("Location:./index.php?page=error");
}
?>

<script type="text/javascript">
    //alert("etes-vous sur de modifier l'article");
</script>

<div class="">
    <img src="../images/<?= $result->image?>" class="" height="300px" width="1350px" alt="<?=$result->titre?>">
</div>
<div class="container">
<?php
if(isset($_POST['confirm'])){
    $titre = htmlspecialchars(trim($_POST['titre']));
    $descript = htmlspecialchars(trim($_POST['descript']));
    $nomNouveau = htmlspecialchars(trim($_POST['nomNouveau']));
    $fichier = $_FILES['fichier']['name'];
    $public = isset($_POST['public']) ? "1" : '';
    $condition = isset($_POST['condition']) ? "1" : '';

    //$errors = [];
    if(($public != 1)  || ($condition != 1)){
        //$errors['cocher'] = "veuillez accepter les conditions générales et/ou rendre public l'article svp";
        $_SESSION['alert'] = "veuillez accepter les conditions générales et/ou rendre public l'article svp";
        $_SESSION['alert_code'] = "error";
    }
    else if(empty($titre) || empty($descript) || empty($nomNouveau) || empty($fichier)){
        //$errors['empty'] = "veuillez remplir tous les champs svp";
        $_SESSION['alert'] = "veuillez remplir tous les champs svp";
        $_SESSION['alert_code'] = "error";
    }
    


/* if(!empty($errors)){
    foreach($errors as $error){
        ?>
        <div class="alert alert-danger mt-2"><?= $error?></div>
        <?php
    }
} */
else{
    $msg ="";
    $fileZise = $_FILES['fichier']['size'];
    $fileName = $_FILES['fichier']['name'];
    $fileTmp = $_FILES['fichier']['tmp_name'];
    $fileErr = $_FILES['fichier']['error'];
    $fileType = $_FILES['fichier']['type'];

    
    $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
    $ext = strchr($fileName, '.');

    $nomOff = $nomNouveau.$ext;
    $dest = "../images/".$nomOff;
    if(!in_array($ext,$extensions)){
        $msg = "le fichier que vous envoyé n'est pas autorisé. vérifier l'extension svp";
    }else{
        if($fileZise < 2000000){
            $Move = move_uploaded_file($fileTmp, $dest);
            $e = [
                'titre'       => $titre,
                'description' => $descript,
                'image'       => $nomOff,
                'poster'      => $public,
                'id'          => $_GET['id'],
            ];
        
            $sql = "UPDATE article SET  titre=:titre, description =:description, date_publier = NOW(), image =:image, poster =:poster  WHERE id=:id";
            $req = $connexion->prepare($sql);
            $req->execute($e);
        
            if( $Move){
                //$msg = "La modification est éffectuée avec succès, shaloom";
                $_SESSION['alert'] = "La modification est éffectuée avec succès, shaloom";
                $_SESSION['alert_code'] = "success";
                }
        }else{
            //$msg = "La taille du fichier est trop grande, compresser svp";
            $_SESSION['alert'] = "La taille du fichier est trop grande, compresser svp";
            $_SESSION['alert_code'] = "error";
        }
        


    }
    }
}

?>

<!-- <?php
//if(isset($msg)){
   // ?>
    <div class="alert alert-success mt-2"><?=$msg?></div>
    <?php
//}
?> -->
    <h2>Modifier Article</h2><hr>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Titre de l'article</label>
            <input type="text" name="titre" class="form-control" id="titre" value="<?=$result->titre?>">
        </div>
        <div class="form-group">
            <label for="message">Déscription de la vidéo</label>
            <textarea name="descript" id="" cols="30" rows="5" class="form-control"><?=($result->description)?></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="nomNouveau" placeholder="Nouveau nom de l'image" class="form-control"><br>
                    <!-- <input type="file" class="formcontrol" name="fichier" id="photo" value="<?=$result->image ?>"> -->
                    <input type="file" class="formcontrol" name="fichier" id="real-file" value="<?=$result->image ?>" hidden="hidden" >
                    <button class="btn btn-outline-danger " type="button" id="custom-button"><i class="fas fa-camera mr-2"></i>Choisir un fichier</button>
                    <span id="custom-text">Aucun fichier choisi</span>
                </div>
                <div class="col-md-3 form-check">
                    <input type="checkbox" name="public" class="form-check-input" <?php echo ($result->poster =="1") ? "checked" : "" ?> id="check">
                    <label for="check" class="text-danger"><small><h6> Rendre Public</h6></small></label><br>
                    <input type="checkbox" name="condition" class="form-check-input" id="check1">
                    <label for="check1" class="text-danger"><small><h6> Accepter les conditions générales</h6></small></label>
                </div>
                <div class="col-md-3">
                    <button type="submit" name="confirm" class="btn btn-outline-primary btn-block">Confirmer la Modification</button>
                </div>
            </div>
        </div>

    </form>
</div>

