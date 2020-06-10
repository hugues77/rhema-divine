<?php
require_once 'main-functions.php';
$connexion->exec("DELETE FROM comments WHERE id ={$_POST['id']}");
// if($res){
//    var_dump("tres bien");
//    }else{
//      echo 'faux';
//  }