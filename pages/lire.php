<?php
/** traitement de la lecture en dependant de la valeur  de GET[livre] */
$livre = $_GET['livre'];

//requete pour recuperer la bible depuis le livre passé en GET
$req = "SELECT DISTINCT livre, chapitre FROM bible WHERE livre='$livre' ORDER BY id";
$sql_livre = $connexion->query($req);
$res = $sql_livre->fetchAll(PDO::FETCH_OBJ);

if(!$res){
        ?>
        <script type="text/javascript">
        document.location.href="index.php?page=error";
        </script>
    <?php
}
?>
<div class="">
    <div class="row">
        <?php //foreach($res as $re): ?>
            <div class="col-md-3">
                <div class="row">
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action active " data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="true">
                            <h5>Livre de <?=$livre?><i class="fas fa-ellipsis-h marginlivre"></i></h5>
                        </a>

                        <?php foreach($res as $re): ?>
                            <a href="#" chapitre=<?=$re->chapitre?> livre=<?=$livre?> class="list-group-item list-group-item-action btn_chapitre"><?=$re->livre?>  <?=$re->chapitre?> <i class="fas fa-angle-right marginlivre "></i></a>
                        <?php endforeach; ?>
                    </div>
                </div>  
            </div>
            <div class="col-md-9 description">
                
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