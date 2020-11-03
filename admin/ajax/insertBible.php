<?php
require_once 'main-functions.php';
$titre = htmlspecialchars(trim($_POST['titre']));
$j = htmlspecialchars(trim($_POST['code']));
$livre = htmlspecialchars(trim($_POST['livre']));
$chapitre = htmlspecialchars(trim($_POST['chapitre']));
$verset = htmlspecialchars(trim($_POST['verset']));
$categ_livre = htmlspecialchars(trim($_POST['categ_livre']));
$type_liv = htmlspecialchars(trim($_POST['type_liv']));
$texte = htmlspecialchars(trim($_POST['texte']));
//on exécute la requete
if(isset($livre,$chapitre,$verset, $texte) && !empty($livre) && !empty($chapitre) && !empty($verset) && !empty($texte)){
    //on verifie si le verset à été déjà enregistrer
    $array = [
        'livre' => $livre,
         'chapitre' =>$chapitre,
        'verset'   =>$verset,
        'description' =>$texte
    ];
    $sq = "SELECT * FROM bible WHERE (livre = :livre AND chapitre =:chapitre AND verset =:verset) OR (description =:description)";
    $verf = $connexion->prepare($sq);
    $verf->execute($array);
    $is_exist = $verf->rowCount($sq);
    
    if($is_exist){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ouups!</strong> Echec d\'enregistrement.Ce Verset a été déjà envoyer dans la base!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }else{
         //On insert les données
         
        $req = $connexion->prepare("INSERT INTO bible (livre,chapitre,verset,titre,categ_livre,type_liv,jesus,description) VALUES(?,?,?,?,?,?,?,?)");
        $insertData = $req->execute(array($livre,$chapitre,$verset,$titre,$categ_livre,$type_liv,$j,$texte));
        if ($insertData) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Félicitations!</strong> Vos données sont enregistrées avec succès.Merci
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
        }else{

            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ouups!</strong> Echec lors de  l\'enregistrement dans la base de données. 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';

        }
    }
}else{

    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ouups!</strong> Echec d\'enregistrement.Merci de renseigner tous les champs réquis svp
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';

}

   