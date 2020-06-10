<br><h2 class="text-left">Ajouter un Commentaire</h2>

<?php
if(isset($_POST['formcomments'])){
    $name = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $comment = htmlspecialchars(trim($_POST['comment']));
    $errors = [];

    if(empty($name) || empty($email) || empty($comment)){
        $errors['empty'] = "Tous les champs doivent etre remplis. Merci";
    }else{
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "l'adresse mail utilisée n'est pas valide, verifier svp";
        }else{
            //$msg = "commentaire envoyé avec succès,Mais pas enregistrer. merci";
        }
        
    }

    if(!empty($errors)){
        ?>
        <div class="alert alert-danger text-light">
            <?php foreach($errors as $error){
                echo $error."<br>";
            }
                
            ?>
        </div>
    <?php
    }else{

        //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
        //$date = date('d/m/Y H:i:s');
        $sql = ("INSERT INTO comments (nom, prenom, email, commentaire, article_id) VALUES(?, ?, ?, ?, ?)");
        $req = $connexion->prepare($sql);
        $succes =$req->execute(array($name,$prenom,$email,$comment, $_GET['id']));
        
        if($succes){
            $msgComments = "Commentaire envoyé avec succès.bien jouer, Merci";
        }
        ?>
        <div class=" alert alert-success"><?= $msgComments ?></div>
        <?php
    }
}
?>

<form action="" method="POST">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="nom"  placeholder="First name">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="prenom"  placeholder="Last name">
        </div>
    </div><br>
    <div class="text-left">
        <input type="email"  class="form-control" name="email" placeholder="votre email svp"><br>
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
    $commentaire = 'Aucun
     Commentaire à été posté... soyez le prémier!';
    ?>
    <p class="text-left"><?=$commentaire ?></p>
    <?php
}
?>