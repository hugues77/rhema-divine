<?php
require_once 'pages/connection.php';
//var_dump($reqV);


?>

<h2 class="text-dark text-left">Faire Un Don</h2><hr class="rouge"/>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick" />
    <input type="hidden" name="hosted_button_id" value="JD2JAP9ACUW7W" />
    <input type="image" src="http://rhema-divine.com/images/logo-paypal.jpg" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
    <img alt="" border="0" src="https://www.paypal.com/en_FR/i/scr/pixel.gif" width="1" height="1" />
</form>
<br/>
<h2 class="text-dark text-left">Vidéos Récentes</h2><hr class="bleu"/>
<section class="text-dark">
<!--  section les videos partie gauche -->
<?php foreach($reqV as $resol):?>
    <div>
        <div class="row no-gutters">
            <div class="col-xs-5 col-sm-5 col-lg-5 col-md-5">
                <a href="index.php?page=publication&id=<?= $resol->id ?>"><img src="images/<?=$resol->image ?>" alt="" class="taille_md taille_xs taille_sm"></a>
            </div>
            <div class="col-xs-7 col-sm-7 col-lg-7 col-md-7">
                <div class="card-body">
                    <a href="index.php?page=publication&id=<?= $resol->id ?>"><h5 class="card-title mt-0"><?= substr(nl2br($resol->titre),0,30 )?>.</h5></a>
                    <div class="row">    
                        <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">    
                            <p class="card-text"><small class="text-muted">Publié le <?= date("d/m/Y",strtotime($resol->date_publier)) ?></small></p>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                            <small class="btn btn-danger text-light taill_cat_md taill_cat_xs taill_cat_sm align-items-center"><?=$resol->categorie_article ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
<?php endforeach; ?>
</section>