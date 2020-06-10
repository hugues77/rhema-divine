<?php
require_once 'main-functions.php';
$res = $connexion->exec("UPDATE comments SET confirm = '1' WHERE id='{$_POST['id']}'");

//test
if($res){
    var_dump("tres bien");
}else{
    echo 'faux';
}
?>