<?php
/** traitement de la lecture en dependant de la valeur  de GET[mot clé] */
if(isset($_POST['btn_recherche'])){

$mot_cle = htmlspecialchars(trim($_POST['recherche_verset']));

if(empty($mot_cle)){
    $_SESSION['alert'] = "veuiller entrer le mot clé pour votre recherche svp";
    $_SESSION['alert_code'] = "error";
}else{

if($mot_cle){

//requete pour recuperer les recherches des versets
//$req_r = "SELECT DISTINCT * FROM bible WHERE (description = '$mot_cle' OR description REGEXP '[[:<:]]".$mot_cle."[[:>:]]') GROUP BY description";
$req_r ="SELECT * FROM bible WHERE description LIKE '%$mot_cle%' ORDER BY id ASC LIMIT 0,10";
$sql_result = $connexion->query($req_r);
$res_verset = $sql_result->fetchAll(PDO::FETCH_OBJ); 
$data_result = $sql_result->rowCount();?>


<div class="">
    <div class="row">
        <?php //foreach($res as $re): ?>
            <div class="col-md-3">
                <div class="row">
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action active " data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="true">
                            <h5>Livre de la bible<i class="fas fa-ellipsis-h marginlivre"></i></h5>
                        </a>
                    </div>
                </div>  
            </div>
            <div class="col-md-9">
                <?php if(!$res_verset){ 
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention ! </strong>Le mot clé <strong><?=$mot_cle?></strong> que vous récherchez est introuvable, Réessayer!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                } else{
                    //requete pour les nombre de recherche
                    $rqtt ="SELECT COUNT(*) as nb_res FROM bible WHERE description LIKE '%$mot_cle%' ";
                    $req_run1 = $connexion->query($rqtt);
                    $nb_ligne= $req_run1->fetch();
                    $nb_ligne = $nb_ligne['nb_res'];
                    if($data_result > 0){ ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Félicitation!</strong> Nous avons trouvés <b><?=$nb_ligne?></b> résultats  pour  <b class="text-Capitalize"><?= $mot_cle?></b>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }

                    //affichage du resultat description
                    foreach($res_verset as $res): ?>
                        <div>
                            <i class="fas fa-book-open text-danger me-2"></i><a href="index.php?page=lire&livre=<?=$res->livre?>" chapitre=<?=$res->chapitre?> livre=<?=$res->livre?> class="text-decoration-none"><strong><?=$res->livre?>  <?=$res->chapitre?> . <?=$res->verset?></strong></a>
                            <p class="text-justify ms-2"> <?=$res->description?></p><hr>
                        </div>
                    <?php endforeach; 
                }
                ?>
                
            </div>
            
        <?php //endforeach; ?>
    </div>
</div>

<!-- traitement pour afficher les livres dans boite modal -->
<?php
//requete pour recuperer la bible depuis le livre passé en GET
$req_mod = "SELECT DISTINCT livre FROM bible WHERE categ_livre='nouveau_test' ORDER BY id";
$sql_livre1 = $connexion->query($req_mod);
$res_mod = $sql_livre1->fetchAll(PDO::FETCH_OBJ);

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Les Livres de la BIble</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php foreach($res_mod as $rem): ?>
                    <a href="index.php?page=lire&livre=<?=$rem->livre?>" class="list-group-item list-group-item-action "><?=$rem->livre?></a>
                <?php endforeach; ?>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary"><a href="index.php?page=bible" class="text-decoration-none text-light">Retour Accueil</a></button>
      </div>
    </div>
  </div>
</div>
<?php }else{
            $_SESSION['alert'] = "veuiller entrer le mot clé pour votre recherche svp";
            $_SESSION['alert_code'] = "error";
        }
    }

} ?>