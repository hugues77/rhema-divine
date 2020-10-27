<?php
require_once 'main-functions.php';
//$messages = array();
$id = $connexion->lastInsertId();

$recup_messages = $connexion->query("SELECT DISTINCT * FROM bible ORDER BY id DESC LIMIT 0,4 ");

/* while($all = $recup_messages->fetch()){
    $messages[] = $all;
} */
$res = $recup_messages->fetchAll(PDO::FETCH_OBJ);
foreach($res as $re){
    ?>
    <h4><?= $re->livre ?> <?= $re->chapitre ?>. <?= $re->verset ?></h4>
    <small class="font-weight-bold"><?= $re->titre?></small>
    <p class="text-justify <?= (($re->jesus) == 1 ? "text-danger" : "")?>"><?= $re->description ?></p>
    <?php
}