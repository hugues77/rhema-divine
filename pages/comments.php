<br><h2 class="text-left">Ajouter un Commentaire</h2>

<?php
if(isset($_POST['formcomments'])){
    if(!isset($_SESSION['nom'])){
        $name = htmlspecialchars(trim($_POST['nom']));
    }
     else{
         $name = $_SESSION['nom'];
     }
     if(!isset($_SESSION['prenom'])){
        $prenom = htmlspecialchars(trim($_POST['prenom']));
    }
     else{
        $prenom = $_SESSION['prenom'];
     }
     if(!isset($_SESSION['email'])){
        $email = htmlspecialchars(trim($_POST['email']));
    }
     else{
        $email = $_SESSION['email'];
     }
    
    $comment = htmlspecialchars(trim($_POST['comment']));
    //$errors = [];

    if(empty($name) || empty($email) || empty($comment)){
        //$errors['empty'] = "Tous les champs doivent etre remplis. Merci";
        $_SESSION['alert'] = "Tous les champs doivent etre remplis. Merci";
        $_SESSION['alert_code'] = "error";
    }
    
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //$errors['email'] = "l'adresse mail utilisée n'est pas valide, verifier svp";
            $_SESSION['alert'] = "l'adresse mail utilisée n'est pas valide, verifier svp";
            $_SESSION['alert_code'] = "error";
        }
        
    

/*     if(!empty($errors)){
        ?>
        <div class="alert alert-danger text-light">
            <?php foreach($errors as $error){
                echo $error."<br>";
            }
                
            ?>
        </div>
    <?php
    } */
    else{

        //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
        //$date = date('d/m/Y H:i:s');
        $sql = ("INSERT INTO comments (nom, prenom, email, commentaire, article_id) VALUES(?, ?, ?, ?, ?)");
        $req = $connexion->prepare($sql);
        $succes =$req->execute(array($name,$prenom,$email,$comment, $_GET['id']));
        
        if($succes){
            //$msgComments = "Commentaire envoyé avec succès.bien jouer, Merci";
            $_SESSION['alert'] = "Commentaire envoyé avec succès.bien jouer, Merci";
            $_SESSION['alert_code'] = "success";
        }
    }
}
?>

<form action="" method="POST">
    <?php
    if(!isset($_SESSION['email']) || !isset($_SESSION['pseudo'])){?>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="nom"  placeholder="votre nom">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="prenom"  placeholder="votre prénom">
        </div>
    </div><br>
    <div class="text-left">
        <input type="email"  class="form-control" name="email" placeholder="votre email svp"><br>
    </div>
<?php
    } ?>
    
    <div>
        <textarea type="text" class="form-control" name="comment" placeholder="votre Commentaire" rows ="5"></textarea><br>
        <button type="submit" class="btn btn-primary text-left" name="formcomments">Envoyer mon commentaire</button>
    </div>
    
</form>
<h3 class="text-primary text-left">Derniers Commentaires</h3>
<?php
//$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
$com = $connexion->query("SELECT * FROM comments WHERE comment_vue = '1' AND article_id='{$_GET['id']}' ORDER BY date_com DESC ");
$res = $com->fetchAll(PDO::FETCH_OBJ);
//var_dump($res);
if($res != false){
    foreach($res as $re):
        ?>
        <div class=" alert alert-info text-left">
            <i class="fas fa-quote-left"></i>
            <strong class="text-capitalize"><?=$re->nom .' '. $re->prenom ?> (<?= date("d/m/Y", strtotime($re->date_com)) ?>)</strong>
            <p class="text-justify ml-3"><?= $re->commentaire?></p>
        </div>
           
    <?php endforeach ?>
<?php
}
else{
    $commentaire = 'Aucun Commentaire à été posté... soyez le prémier!';
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention ! </strong><?=$commentaire ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>