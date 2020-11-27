<?php
session_start();
require_once 'main-functions.php';
$admin = $_SESSION['name_admin'];
//$messages = array();
$id = $connexion->lastInsertId();

$recup_messages = $connexion->query("SELECT DISTINCT * FROM bible WHERE admin = '$admin' ORDER BY id DESC LIMIT 0,4 ");

/* while($all = $recup_messages->fetch()){
    $messages[] = $all;
} */
$res = $recup_messages->fetchAll(PDO::FETCH_OBJ);
foreach($res as $re){
    ?>
    <div class="row">
        <div class="col-md-7">
            <h4><?= $re->livre ?> <?= $re->chapitre ?>. <?= $re->verset ?></h4>
        </div>
        <div class="col-md-5 text-right">
            <i><small class="text-danger"><i class="far fa-user"></i>Publié(e) par <?=$re->admin ?></small></i>
        </div>
    </div>
    <small class="font-weight-bold"><?= $re->titre?></small>
    <p class="text-justify <?= (($re->jesus) == 1 ? "text-danger" : "")?>"><?= $re->description ?></p>
    <?php
}