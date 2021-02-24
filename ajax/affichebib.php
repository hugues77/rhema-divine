<?php
require_once 'connexion.php'; 
$sq = "SELECT verset, description, jesus, titre FROM bible WHERE chapitre='{$_POST['chapitre']}' AND livre='{$_POST['livre']}' ORDER BY id  AND chapitre ";
$aff = $connexion->query($sq);
$result = $aff->fetchAll(PDO::FETCH_OBJ);


?>

<div class="row mt-3">
    <div class="col-md-6">
        <h5><?=$_POST['livre']?>  <?=$_POST['chapitre']?></h5><hr>
    </div>
    <div class="col-md-6">
        <form action="" method="POST">
            <input type="text" class="form-control me-5" placeholder="votre recherche rapide">
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-10">
        <?php foreach($result as $res): ?>
            <div class="col-md-12">
                <h4 class="text-center text-danger"><?=$res->titre?></h4>
                <span class="text-justify"><strong><?=$res->verset?></strong>. </span><span class="text-justify <?= (($res->jesus) == 1 ? "text-danger" : "")?>"><?=$res->description?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md-2 bg-secondary"></div>
</div>