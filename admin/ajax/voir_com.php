<?php
require_once 'main-functions.php';
$res = $connexion->exec("UPDATE comments SET comment_vue = '1' WHERE id='{$_POST['id']}'");
// if($res){
//     var_dump("tres bien");
// }else{
//     echo 'faux';
// }