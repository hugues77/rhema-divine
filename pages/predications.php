
   <!--  les videos du rhema divine -->

    <main role="main" class="">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Prédications Evangélique</h1>
          <p class="lead text-muted">Bienvenue dans l'espace dédiée aux prédications et enseignements évangéliques publié par Rhema divine, Vous pouvez en réchercher via la barre de récherche par predicateur ou par thème.</p>
          
          <form action="" method="POST" class="form-group">
              <?php
                if(isset($_POST['btn_pred'])){
                  $titre = htmlentities(trim($_POST['theme_pred']));
                  $data2 ="";
                  if(empty($titre)){
                    $_SESSION['alert'] = "veuiller entrer le mot clé pour votre recherche svp";
                    $_SESSION['alert_code'] = "error";
                  }else{
                    
                    //requetes pour l'affichage de resultats
                    $rqt ="SELECT * FROM article WHERE categorie_article='Predication' AND CONCAT(auteur,titre) LIKE '%$titre%' ";
                    $req_run = $connexion->query($rqt);
                    $reslt = $req_run->fetchAll(PDO::FETCH_OBJ);
                    $data = $req_run->rowCount($rqt);

                    //requete pour les nombre de recherche
                    $rqtt ="SELECT COUNT(*) as nb_res FROM article WHERE categorie_article='Predication' AND CONCAT(auteur,titre) LIKE '%$titre%' ";
                    $req_run1 = $connexion->query($rqtt);
                    $nb_ligne= $req_run1->fetch();
                    $nb_ligne = $nb_ligne['nb_res'];
                  

                    if($data > 0){ ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Félicitation!</strong> Nous avons <b><?=$nb_ligne?></b> résultats trouvés pour <?= $titre?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php
                    }else{
                      $_SESSION['alert'] = "Désolé, Nous n'avons rien trouvé, Reesayer un autre!";
                      $_SESSION['alert_code'] = "error";
                    }
                  }
                }

              ?>
              <div class="input-group mb-2"> 
                    <input type="text" name="theme_pred" class="form-control" id="inlineFormInputGroup" placeholder="Votre recherche">
                    <div class="input-group-prepend">
                        <button type="submit" name="btn_pred" class="input-group-text btn btn-primary btn_valider_pred">valider</button>
                    </div>
              </div>
          </form>
        </div>
      </section>
      <div class="album py-5">
        <div class="container ">
          <div class="row">
          <?php
              if($data > 0){
              foreach($reslt as $r):?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
                  <div class="card text-dark">
                    <a href="index.php?page=publication&id=<?= $r->id ?>"><img src="images/<?=$r->image ?>" alt="<?=$r->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
                    <div class="card-body">
                      <h4 class="card-title "><?= $r->titre?> par <?=$r->auteur ?></h4>
                      <p class="card-text"><?= substr(nl2br($r->description),0,100); ?>...</p>
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6">
                          <a href="index.php?page=publication&id=<?= $r->id ?>" class="btn btn-primary ">Voir la video</a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6 text-right">
                          <a href="#" class="btn btn-outline-primary phone_cache"><div class=""><?= date("d/m/Y", strtotime($r->date_publier));?></div></a>
                        </div>
                      </div>
                      <div class="mt-1 text-black-50"><i class="fas fa-heart text-danger mr-1"></i>By <?=$r->auteur?></div>
                    </div>
                  </div>
                </div>
              <?php 
               endforeach;
            }
            ?>
          </div>
          <div class="lance_pred mt-3"><?php require 'pagination.php';?></div>
        </div>
      </div>
      
</main>

