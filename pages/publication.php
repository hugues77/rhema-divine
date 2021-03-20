
<?php 

    $id = $params['id'];
    //echo "je suis sur l'article : $slug avec un id numéro : $id";
    $connexion = new PDO('mysql:host=localhost; dbname=rhema','root','root');
    //preparer la requete
    $req = $connexion->query("SELECT url_youtub,titre 
                                FROM article
                                WHERE id= '{$id}' AND poster = '1'
                                 ");
    $videos = $req->fetchAll(PDO::FETCH_OBJ);
    //var_dump($videos);

    //$titre = strtr($titre, "àäåâôöîïûüéè", "aaaaooiiuuee"); // on remplace les accents.
   
    
    if(!$videos){
    ?>
    <script type="text/javascript">
        document.location.href="/error.php";
    </script>
    <?php
    }else{
       
    ?>
    <section class=" pr-3">
        <div class="container-fluid">
            <div class="row mt-1">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8 text-center pl-3 pr-3 ">
                    <?php foreach($videos as $video): 
                        $url = "https://www.youtube.com/embed/".$video->url_youtub ?>
                        <h2 class="bg-info text-light  justify-content-center align-items-center" style="height:50px"><?= $video->titre ?></h2>
                        <iframe class="taille_youtube_xs taille_youtube_md taille_youtube_sm"  
                            src="<?=$url ?>" 
                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <hr class="bleu">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4"></div>
                            <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8 text-right">
                                <a href="#" class="btn btn-outline-danger"><img src="images/youtube.png" class="partage_md partage_xs partage_sm" /> youtube</a>
                                <a href="#" class="btn btn-outline-info"><img src="images/twitter.png" class="partage_md partage_xs partage_sm" /> twitter</a>
                                <a href="#" class="btn btn-outline-dark"><img src="images/instagram.png" class="partage_md partage_xs partage_sm"  /> instagram</a>
                                <a href="#" class=" btn btn-outline-primary"><img src="images/facebook.png" class="partage_md partage_xs partage_sm" /> facebook</a>
                            
                            </div>
                        </div> -->
                    <?php endforeach; ?>
                        <!-- video en bas  -->
                        <!-- <h2 class="text-left mt-1">Publicités</h2><hr>  -->
                        <div class="text-center">
                            <?php  //require 'video_bas.php';?>
                        </div>
                        <!-- commentaires -->
                        <br>
                        <div>
                            <?php //require 'comments.php'; ?>
                        </div>
                </div>
                <div class="col-md-4">
                    <?php require_once 'slide.php'; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>


