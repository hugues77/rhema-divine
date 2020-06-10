<?php
//require_once '../header.php';
$titre = "Evangéliste Handy ";
$url = "https://www.youtube.com/embed/a7Dnfpf3urM";
?>

<section class=" pr-3">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-md-8 text-center pl-3 pr-3 ">
            <h2 class="bg-info text-light  justify-content-center align-items-center" style="height:50px"><?= $titre ?></h2>
                <iframe width="859" height="450" 
                src="<?=$url ?>" 
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <hr class="bleu">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 text-right">
                        <a href="#" class="btn btn-outline-danger"><img src="images/youtube.png" width="23px" height="23px"/> youtube</a>
                        <a href="#" class="btn btn-outline-info"><img src="images/twitter-logo-1-1.png" width="23px" height="23px"/> twitter</a>
                        <a href="#" class="btn btn-outline-dark"><img src="images/instagram.png" width="23px" height="23px"/> instagram</a>
                        <a href="#" class=" btn btn-outline-primary"><img src="images/fb.jpg" width="23px" height="23px"/> facebook</a>
                    
                    </div>
                </div>
                <!-- video en bas et commentaires -->
                <h2 class="text-left">Publicités</h2><hr> 
                <div class="text-center">
                    <?php  require 'video_bas.php';?>
                </div><br>
                <div>
                    <?php require 'comments.php'; ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php require_once 'slide.php'; ?>
            </div>
        </div>
    </div>

</section>
