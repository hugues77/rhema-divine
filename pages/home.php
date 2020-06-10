<?php
    
    $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
    //preparer la requete
    $req = $connexion->query("SELECT * FROM article WHERE poster='1' ORDER BY date_publier DESC LIMIT 0,6");

    //affiche
    $articles = $req->fetchAll(PDO::FETCH_OBJ);
    //var_dump($articles);
    //executer la req
    if($articles){
      $msg = 'tres bien';
    }else{
      $msg = 'zoba';
    }
    
  ?>
  <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 "><h2 class="text-danger text-center">Actualités Chrétiennes</h2><hr class="blanc"/>
          <?php foreach($articles as $article): ?> 
            <div class="card text-dark">
             <a href="accueil.php?page=publication&id=<?= $article->id ?>"><img src="images/<?=$article->image ?>" alt="<?=$article->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
              <div class="card-body">
                <h4 class="card-title "><?= $article->titre?> par <?=$article->auteur ?></h4>
                <p class="card-text"><?= substr(nl2br($article->description),0,100); ?>...</p>
                <div class="row">
                  <div class="col-md-5">
                    <a href="accueil.php?page=publication&id=<?= $article->id ?>" class="btn btn-primary ">Voir la video</a>
                  </div>
                  <div class="col-md-7 text-right">
                    <a href="#" class="btn btn-outline-primary"><div class=""><?= date("d/m/Y à H:i", strtotime($article->date_publier));?></div></a>
                    <a href="#" class="rounded-circle"><img src="images/youtube.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/twitter.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/instagram.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/facebook.png" width="30px" height="30px"/></a>
                  </div>
                </div>
              </div>
            </div><hr>
      <?php endforeach ?>
  </div>
  <div class="col-md-3"></div>
   </div>

