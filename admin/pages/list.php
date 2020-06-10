<?php
if(admin() != 1){
  header("Location:index.php?page=dashboard");
}
//$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
//-------------------------------------------------------------------
//on fait appel à tous les elements qui sont dans la table article
//--------------------------------------------------------------------
$requette = $connexion->query("SELECT * FROM article  ORDER BY date_publier DESC");
$reps = $requette->fetchAll(PDO::FETCH_OBJ);

//var_dump($reps);

?>

<div class="text-center bg-primary p-2 "><h2 class="align-items-center">Listing des articles</h2></div>

<div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 "><h2 class="text-danger text-center">Actualités Chrétiennes</h2><hr class="blanc"/>
          <?php foreach($reps as $rep): ?> 
            <div class="card text-dark">
             <a href="../accueil.php?page=publication&id=<?= $rep->id ?>"><img src="../images/<?=$rep->image ?>" alt="<?=$rep->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
              <div class="card-body">
                <h4 class="card-title "><?= $rep->titre?> par <?=$rep->auteur ?> <?= ($rep->poster ==="0") ? "<i class='fas fa-lock ml-2 text-danger'></i>" :"" ?></h4>
                <p class="card-text"><?= substr(nl2br($rep->description),0,100); ?>...</p>
                <div class="row">
                  <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="../accueil.php?page=publication&id=<?= $rep->id ?>" class="btn-block btn btn-primary ">Voir</a>
                        </div>
                        <div class="col-md-6">
                        <a href="index.php?page=modification&id=<?= $rep->id ?>" class=" btn-block btn btn-primary ">Modifier</a>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-7 text-right">
                    <a href="#" class="btn btn-outline-primary"><div class=""><?= date("d/m/Y à H:i", strtotime($rep->date_publier));?></div></a>
                    <a href="#" class="rounded-circle"><img src="../images/youtube.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="../images/twitter.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="../images/instagram.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="../images/facebook.png" width="30px" height="30px"/></a>
                  </div>
                </div>
              </div>
            </div><hr>
      <?php endforeach ?>
  </div>