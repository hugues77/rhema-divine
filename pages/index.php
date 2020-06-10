
  <?php
    require_once 'connection.php';
    $index="Bienvenue dans Rhema divine !";
  
 //var_dump($articles);?>



    <!-- bouton rx sociaux -->
  
  <div class="bg-dark text-white">
    <div class="container-fluid">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center ">

        <!-- Grid column -->
        <div class="phone_mt col-xs-12 col-md-2 col-sm-12 col-lg-2 text-center text-md-left mb-4 mb-md-0">
          <h4 class="mb-0 text-white">Breaking News!</h4>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 text-center text-md-right text-white">
          <marquee>Pour plus des informations, nous sommes à votre disposition par mail (contact@rhema-divine.com).</marquee>
        </div>
        
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>


    
    <!-- corps images PHP -->



    
    <!-- section //video et presentation videos en 3 colonnes -->

    <section class="text-light pl-4 pr-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 "><h2 class="text-danger text-center">A la Une</h2><hr class="bleu"/>
    <!--  section les videos partie gauche -->
            <form action="" method="POST">
              <div class="form-group">
                  <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9 col-md-9">   
                      <select name="categorie" class="custom-select" id="">
                        <option selected value="">Choisir la catégorie...</option>
                          <?php foreach($reps as $rep){
                              $categorie = $rep->lib_categ ;?>
                          <option value="<?=$categorie ?>"><?=$categorie ?></option>
                          <?php
                          } ?>

                      </select>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
                      <input class="btn btn-primary" type="submit" name="search" value="ok">  
                    </div>
                 
                  </div>
              </div>
            </form>
            <?php
            //var_dump($req1);
            
            if(isset($_POST['search'])){
              $categ = $_POST['categorie'];
              if($categ ==="Musique"){
                //affiche categorie Musique ici
                foreach($req1 as $reqM): ?>
                <div class="row card-body">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="card-deck">
                        <div class="card">
                        <a href="index.php?page=publication&id=<?= $reqM->id ?>"><img class="card-img-top" src="images/<?=$reqM->image ?>" width="130px" height="80px"/></a>
                        </div>
                      </div> 
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="text-center text-dark">
                      <a href="index.php?page=publication&id=<?= $reqM->id ?>"><h4 class="text-left"><?=substr(nl2br($reqM->titre),0,18)?>...</h4></a>
                        <p class="card-text text-danger"><small class="text-right"><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqM->date_publier ))?></small></p>
                      </div>
                    </div>
                </div><hr>
                <?php endforeach;
                
                }elseif(($categ ==="Predication")|| ($categ ==="")){
                  //affiche categorie prédication ici
                  foreach($req2 as $reqP): ?>
                  <div class="row card-body">    
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="card-deck">
                          <div class="card">
                          <a href="index.php?page=publication&id=<?= $reqP->id ?>"><img class="card-img-top" src="images/<?=$reqP->image ?>" width="130px" height="80px"/></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="text-center text-dark">
                        <a href="index.php?page=publication&id=<?= $reqP->id ?>"><h4 class="text-left"><?=substr(nl2br($reqP->titre),0,20)?> ...</h4></a>
                          <p class="card-text text-danger"><small class="text-right"><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqP->date_publier ))?></small></p>
                        </div>
                      </div>
                  </div><hr>
                <?php endforeach;
                }
              //categorie Cuisine
              
              elseif($categ ==="Cuisine"){
              //affiche categorie Musique ici
                foreach($req3 as $reqC): ?>
                  <div class="row card-body">          
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="card-deck">
                          <div class="card">
                            <a href="index.php?page=publication&id=<?= $reqC->id ?>"><img class="card-img-top" src="images/<?=$reqC->image ?>" width="130px" height="80px"/></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="text-center text-dark">
                          <a href="index.php?page=publication&id=<?= $reqC->id ?>"><h4 class="text-left"><?=substr(nl2br($reqC->titre),0,20)?> ...</h4></a>
                          <p class="card-text text-danger"><small class="text-right"><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqC->date_publier ))?></small></p>
                        </div>
                      </div>
                  </div><hr>
                <?php endforeach;

                //categorie les deux omers

                  }else{
                  //affiche categorie Musique ici
                  foreach($req4 as $reqD): ?>
                  <div class="row card-body">   
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="card-deck">
                          <div class="card">
                            <a href="index.php?page=publication&id=<?= $reqD->id ?>"><img class="card-img-top" src="images/<?=$reqD->image ?>" width="130px" height="80px"/></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                        <div class="text-center text-dark">
                          <a href="index.php?page=publication&id=<?= $reqD->id ?>"><h4 class="text-left"><?=substr(nl2br($reqD->titre),0,20)?> ...</h4></a>
                          <p class="card-text text-danger"><small class="text-right"><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqD->date_publier ))?></small></p>
                        </div>
                      </div>
                  </div><hr>
                <?php endforeach;
                }
              }
            //on affiche les deux omers avant le selection du categorie
            ?>
            <div class="card">
              <img src="images_omers/<?=$omers->image?>"  alt="<?=$omers->nom?>" class="card-img-top" width="280px" />
            </div>
            <hr/>
            <h3 class="text-dark">Ne rien rater ! </h3><hr class="rouge" />
            <?php
            //Affiche tous les articles aleatoirement et une fois la rechaerche est faite lui est
            //doit etre cacher pour la bonne mise en forme
            
            foreach($rgA as $reqP): ?>
              <div class="row card-body">    
                  <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="card-deck">
                      <div class="card">
                        <a href="index.php?page=publication&id=<?= $reqP->id ?>"><img class="card-img-top" src="images/<?=$reqP->image ?>" width="130px" height="80px"/></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="text-center text-dark">
                      <a href="index.php?page=publication&id=<?= $reqP->id ?>"><h4 class="text-left"><?=substr(nl2br($reqP->titre),0,20)?> ...</h4></a>
                      <div class="card-text text-danger text-right"><small><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqP->date_publier ))?></small></div>
                    </div>
                  </div>
              </div><hr>
            <?php endforeach;
            //fin affichage prédication avant selection
        ?>                
    </div>
    <!-- fin section gauche videos-->

    <!-- debut section video centre -->    
        <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6 "><h2 class="text-danger text-center">Actualités Chrétiennes</h2><hr class="blanc"/>
          <?php foreach($articles as $article): ?> 
            <div class="card text-dark">
             <a href="index.php?page=publication&id=<?= $article->id ?>"><img src="images/<?=$article->image ?>" alt="<?=$article->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
              <div class="card-body">
                <h4 class="card-title "><?= $article->titre?> par <?=$article->auteur ?></h4>
                <p class="card-text"><?= substr(nl2br($article->description),0,100); ?>...</p>
                <div class="row">
                  <div class="col-xs-5 col-sm-5 col-lg-5 col-md-5">
                    <a href="index.php?page=publication&id=<?= $article->id ?>" class="btn btn-primary ">Voir la video</a>
                  </div>
                  <div class="col-xs-7 col-sm-7 col-lg-7 col-md-7 text-right">
                    <a href="#" class="btn btn-outline-primary phone_cache"><div class=""><?= date("d/m/Y à H:i", strtotime($article->date_publier));?></div></a>
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
    <!-- debut section droite widgets -->
          <div class="col-xs-12 col-sm-12 col-lg-3  col-md-3 ">
              <h2 class="text-center text-danger">Faire Un Don</h2><hr class="rouge"/>
              <div class="mb-2">
                <a class="card" href="https://www.paypal.com"><img class="img-thumbnail" src="images/logo_paypal.jpg" width="400px" /></a>
              </div>  
              <h2 class="text-danger text-center">Nos Emissions</h2><hr class="rouge"/>
              <div class="accordion text-secondary" id="accordionExample">
              <div class="card">
                <div class="card-header bg-primary" id="headingOne">
                  <h2 class="mb-0">
                    <div class="text-light p-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                      <h5><i class="fas fa-arrow-alt-circle-right mr-2"></i>Le Show dans le seigneur</h5>
                    </div>
                  </h2>
                </div>
                <div id="collapseZero" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <img src="images/borisB.png" alt="Boris bbl" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-dark" id="heading">
                  <h2 class="mb-0">
                    <div class="text-light p-2 collapsed" type="button"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <h5><i class="fas fa-clock mr-2"></i>1h de Révélation</h5>
                    </div>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="heading" data-parent="#accordionExample">
                  <div class="card-body">
                    <img src="images/handy.PNG"alt="handy eyong" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-primary" id="headingTwo">
                  <h2 class="mb-0">
                    <div class="text-light p-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <h5><i class="far fa-lightbulb mr-2"></i>Les Deux Omers</h5>
                    </div>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <img src="images/joe.jpg" alt="joe ebey" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header bg-dark" id="headingThree">
                  <h2 class="mb-0">
                    <div class="text-light p-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <h5><i class="fas fa-utensils mr-2"></i>Tango ya Makusa</h5>
                    </div>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                      <img src="images/MamanMz.jpg" alt="Maman christine" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <h3 class="text-dark">Verset Biblique </h3><hr class="bleu" />
            <div class="bg-primary text-light radius">
              <div class="container-fluid py-3 text-justify">
                <script src="http://cafebible.free.fr/lsg/lsg.js" type="text/javascript"></script>
              </div>
              </div>
           
          <!--  section Nos visiteurs -->

            <br/>
            <h3 class="text-dark">Publicités </h3><hr class="rouge" />
            <div class="card">
              <div class="card-img-top">
                <img src="images/pasteur-victor.jpg" class="rounded card-img-top" width="280px" alt="">
              </div>
            </div><br>
            <h3 class="text-dark">Facebook Page </h3><hr class="rouge" />
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frhema.divine%2F&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" 
              width="295" height="300" style="border:none;overflow:hidden" 
              scrolling="no" frameborder="0" allowTransparency="true" 
              allow="encrypted-media">*
            </iframe>
          </div>
        </div>
      </div>
    </section>
    <br/>

    <!-- section les deux omers -->    
    <section class="bg-omers text-light ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">
            <div class="text-white lead"><h2 class="text-left">Pensée du jour</h2><hr class="blanc"/>
            </div> 
          </div>
          <div class="col-xs-12 col-sm-12 col-lg-9 col-md-9">
            <div class="text-left"><img class="rounded"  src="images_omers/<?=$omers->image?>" alt="<?=$omers->nom?>" width="350px"></div>
          </div>
        </div>
      </div>
    </section>
   
<!--Articles en bas de deux omers, -->

<section class="text-light pl-4 pr-4 mt-4">
      <div class="container-fluid">
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
            <h2 class="text-danger text-center">Musiques</h2><hr class="bleu"/>
            <?php foreach($articlesmusiq as $article): ?> 
            <div class="card text-dark">
             <a href="index.php?page=publication&id=<?= $article->id ?>"><img src="images/<?=$article->image ?>" alt="<?=$article->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
              <div class="card-body">
                <h4 class="card-title "><?= $article->titre?> par <?=$article->auteur ?></h4>
                <p class="card-text"><?= substr(nl2br($article->description),0,100); ?>...</p>
                <div class="row">
                  <div class="col-xs-5 col-sm-5 col-lg-5 col-md-5">
                    <a href="index.php?page=publication&id=<?= $article->id ?>" class="btn btn-primary ">Voir la video</a>
                  </div>
                  <div class="col-xs-7 col-sm-7 col-lg-7 col-md-7 text-right">
                    <a href="#" class="btn btn-outline-primary phone_cache"><div class=""><?= date("d/m/Y à H:i", strtotime($article->date_publier));?></div></a>
                    <a href="#" class="rounded-circle"><img src="images/youtube.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/twitter.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/instagram.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/facebook.png" width="30px" height="30px"/></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>  
            <?php
            foreach($req2 as $reqP): ?>
              <div class="row mt-4">    
                  <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="card-deck">
                      <div class="card">
                        <a href="index.php?page=publication&id=<?= $reqP->id ?>"><img class="card-img-top" src="images/<?=$reqP->image ?>" width="130px" height="80px"/></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="text-center text-dark">
                      <a href="index.php?page=publication&id=<?= $reqP->id ?>"><h4 class="text-left"><?=substr(nl2br($reqP->titre),0,20)?> ...</h4></a>
                      <div class="card-text text-danger text-right"><small><i class="far fa-calendar-alt mr-2"></i><?= date("d/m/Y",strtotime($reqP->date_publier ))?></small></div>
                    </div>
                  </div>
              </div><hr>
            <?php endforeach;
            ?>
          </div>
    <!-- fin section gauche Musiques-->

    <!-- debut section video centre predications -->
           
        <div class="col-xs-12 col-sm-12 col-lg-8 col-md-8 ">
          <h2 class="text-danger text-center">Prédications Direct</h2><hr class="blanc"/>
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-7">
                <img src="images/Ev handy1.jpg" class="card-img" width="" height="200px" alt="omers">
              </div>
              <div class="col-md-5 text-dark">
                <div class="card-body">
                  <h4 class="card-title">Les 7 Coupes de la colère de Dieu</h4>
                  <p class="card-text">Handy This ow as ontent. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Las ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4 text-dark">
            <div class="col-xs-12 col-sm-12 col-lg-7  col-md-7 ">
            <div class="">
                <div class="card">
                  <img src="images/tiger.jpg" height="150px" width="" alt="">
                </div>
                <h5 class="text-justify mt-2">This ow as ontentr.</h5>
              </div>
              <div class="mt-3">
                <div class="card">
                  <img src="images/Ev handy1.jpg" height="150px" alt="">
                </div>
                <h5 class="text-justify mt-2">This ow as ontentr.</h5>
              </div>
              <div class="mt-3">
                <div class="card">
                  <img src="images/lolo.jpg" height="150px" alt="">
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <h5 class="text-justify mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                  </div>
                  <div class="col-md-3">
                    <div class="text-right"><a href="" class="mt-2 btn btn-outline-danger "><i class="fas fa-arrow-right  mr-2"></i>Lire</a></div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-5  col-md-5 ">
            <h2 class="text-danger text-center">Tango ya Makusa</h2><hr class="rouge"/>
            <div class="card text-dark">
             <a href="index.php?page=publication&id=<?= $article->id ?>"><img src="images/<?=$article->image ?>" alt="<?=$article->titre ?>" class="card-img-top" width="630px" height="200px"/></a>
              <div class="card-body">
                <h4 class="card-title "><?= $article->titre?> par <?=$article->auteur ?></h4>
                <p class="card-text"><?= substr(nl2br($article->description),0,100); ?>...</p>
                <div class="row">
                  <div class="col-xs-5 col-sm-5 col-lg-5 col-md-5">
                    <a href="index.php?page=publication&id=<?= $article->id ?>" class="btn btn-primary ">Voir la video</a>
                  </div>
                  <div class="col-xs-7 col-sm-7 col-lg-7 col-md-7 text-right">
                    <a href="#" class="btn btn-outline-primary phone_cache"><div class=""><?= date("d/m/Y à H:i", strtotime($article->date_publier));?></div></a>
                    <a href="#" class="rounded-circle"><img src="images/youtube.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/twitter.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/instagram.png" width="30px" height="30px"/></a>
                    <a href="#" class="rounded-circle"><img src="images/facebook.png" width="30px" height="30px"/></a>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>       
        </div>
        <!--Fin section Prédications-->
    <!-- debut section Emissions -->

        
        
    </div>
  </div>
  </section>
  <br/>
              


    
   