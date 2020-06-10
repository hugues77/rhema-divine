<?php
    if(pas_password() === 1){
        header("Location:index.php?page=password");
    }
?>
<div class="container">
<h2 class="">Tableau de bord</h2>
    <div class="row">

        <?php
        $tables = [
            "Publications"    => "article",
            "Commentaires"    => "comments",
            "Administrateurs" => "admins"

        ];
        
        $colors = [
            "article"  => "success",
            "comments" => "danger",
            "admins"   => "dark"

        ];

        foreach($tables as $table_nom => $table){
            //connexion base de données
            //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
            $query = $connexion->query("SELECT COUNT(id) FROM $table");
            $nombre = $query->fetch();
        ?>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-<?= getColor($table ,$colors)?> text-light">
                    <h3 class="card-title"><?= $table_nom ?></h3>
                    <div class="card-text text-light font-weight-bold"><?= $nombre[0] ?></div>
                </div>
            </div>
        </div>  
        <?php } ?>
          
    </div>
    <section class=" mt-2">
        <br>
        <h4 class="">Commentaires non lues</h4><hr>
        <?php 
            $comments =  getComments();
            //var_dump($comments);

        ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><h5>Articles</h5></th>
                    <th><h5>Commentaires</h5></th>
                    <th><h5>Actions</h5></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($comments)){
                    foreach($comments as $comment){
                ?>
                <tr id="commentaire_<?= $comment->id ?>">
                    <td><?= $comment->titre ?></td>
                    <td><?= substr($comment->commentaire, 0,100) ?>...</td>
                    <td>
                        <a href="#" commentaire ="<?=$comment->commentaire ?>" id="<?= $comment->id ?>" class="btn btn-success btn-sm voir_com"><i class="fas fa-check"></i></a>
                        <a href="#" commentaire ="<?=$comment->commentaire ?>" id="<?= $comment->id ?>" class="btn btn-danger btn-sm supp_com"><i class="fas fa-trash-alt"></i></a>
                        <!-- Button trigger modal -->
                        <a href="#comment_<?= $comment->id?>" class="btn btn-primary btn-sm" data-toggle="modal" >
                            <i class="fas fa-ellipsis-v"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="comment_<?= $comment->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $comment->titre ?></h5>        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Commentaire posté par <strong><?=$comment->nom ."  ". $comment->prenom." " ."(" .$comment->email .")" ?></strong><br>
                                    Le <?=date("d/m/Y à H:i",strtotime($comment->date_com)) ?></p><hr>
                                    <p class="text-justify"><?= nl2br($comment->commentaire)?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="<?= $comment->id?>" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times text-danger mr-2"></i>Fermer</button>
                                    <button type="button"commentaire ="<?=$comment->commentaire ?>"  id="<?= $comment->id?>" class="btn btn-primary supp_com"><i class="fas fa-trash-alt mr-2"></i>supprimer</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php 
                    } 
                } else{ ?>
                    <div class="alert alert-danger">Acun Commentaire à validé, Merci</div>
                   <?php 
                }?>
                
            </tbody>
        </table>
    </section>
</div>