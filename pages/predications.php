<?php
    require_once 'connection.php'; 
  ?>

   <!--  les videos du rhema divine -->

    <main role="main" class="">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Prédications Evangélique</h1>
          <p class="lead text-muted">Bienvenue dans l'espace dédiée aux prédications et enseignements évangéliques publié par Rhema divine, Vous pouvez en réchercher via la barre de récherche par predicateur ou par thème.</p>
          
          <form action="" method="POST" class="form-group">
                <div class="row">
                    <input type="text" class="form-control col-md-10" placeholder="votre recherche ici">  
                    <button type="button"class="btn btn-outline-primary col-md-2"><i class="fas fa-search "></i></button>
                </div>
          </form>
        </div>
      </section>
      
      <div class="album py-5">
        <div class="container ">
        
          <div class="row">
          <?php foreach($req2 as $res):?>
            <div class="col-xs-12 col-sm-12 col-lg-4 col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="index.php?page=publication&id=<?= $res->id ?>"><img class="card-img-top img-pred" src="images/<?=$res->image ?>" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title"><?=$res->titre ?></h5>
                  <p class="card-text"><?=substr(nl2br($res->description),0,30) ?>.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="index.php?page=publication&id=<?= $res->id ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Partager</button>
                    </div>
                    <small class="text-muted btn  btn-outline-primary"><?=date("d/m/Y à  H:i", strtotime($res->date_publier),) ?></small>
                  </div>
                </div>
              </div>
            </div> 
            <?php endforeach?>
          </div><br>
          <?php require_once 'pagination.php';?>
        </div>
      </div>
      <!-- pagination -->

    

</main>

