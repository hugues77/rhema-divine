<?php
if(admin() != 1){
    header("Location:index.php?page=dashboard");
}
?>
<div class="container">
    <h2 class="mt-3">Parametres</h2><hr>
    <div class="row">
        <div class="col-md-6">
            <h4 class="mb-2 mt-2">Moderateurs</h4>
            <?php 
            //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
            $reqe = $connexion->query("SELECT * FROM admins");
            $res = [];
            while($row = $reqe->fetchObject()){
                $res[] = $row;
            }
            ?>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($res as $r){
                        ?>
                    <tr>
                        <td><?=$r->name?></td>
                        <td><?=$r->email?></td>
                        <td><?=$r->role?></td>
                        <td><?php echo (!empty($r->password))?"<i class='fas fa-user-check text-success ml-3'></i>" : "<i class='ml-3 fas fa-user-times text-danger'></i>" ?></td>
                    </tr>
                        <?php
                    }

                    ?>
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4 class="mb-2 mt-2">Nouveau Moderateur</h4>

            <?php
            if(isset($_POST['submitSetting'])){
                $name =  htmlspecialchars(trim($_POST['nom']));
                $mail =  htmlspecialchars(trim($_POST['mail']));
                $mail2 =  htmlspecialchars(trim($_POST['mail2']));
                $role =  htmlspecialchars(trim($_POST['role']));

                //$errors =[];
                //-----------------------------------------------------------------------
                // on verifie si l'adresse email n'appartient pas à un autre moderateur ou admin
                // on compare avec tous les emails qu'on a deja stoché dans la base de données
                //------------------------------------------------------------------------------
                
                $tab = [
                    'email'  =>$mail
                ];
                $sql = "SELECT * FROM admins  WHERE email = :email";
                $req = $connexion->prepare($sql);
                $req->execute($tab);
                $free = $req->rowCount($sql);

                        //-----------------------------------------------------------------------
                // on va creer un Token aleatoire
                // on va l'envoyer pour confirmer le mail
                //--------------------------------------------
                $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
                $token = substr(str_shuffle(str_repeat($chars,30)),0,30);

                if(empty($name) || empty($mail) || empty($mail2)){
                    //$errors['empty'] = "Merci de remplir tous les champs de saisie svp";
                    $_SESSION['alert'] = "Merci de remplir tous les champs de saisie svp";
                    $_SESSION['alert_code'] = "error";
                }
                elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
                    //$errors['email'] = "L'adresse mail est invalide. Vérifier svp";
                    $_SESSION['alert'] = "L'adresse mail est invalide. Vérifier svp";
                    $_SESSION['alert_code'] = "error";
                }

                elseif($mail != $mail2){
                    //$errors['different'] = "Les deux adresses email ne sont pas identiques. Vérifier";
                    $_SESSION['alert'] = "Les deux adresses email ne sont pas identiques. Vérifier";
                    $_SESSION['alert_code'] = "error";
                }

                elseif($free){
                    //$errors['taken'] = "L'adresse email est déjà assignée à un autre modérateur";
                    $_SESSION['alert'] = "L'adresse email est déjà assignée à un autre modérateur";
                    $_SESSION['alert_code'] = "error";
                }



                //on verifi si pas d'erreur, on demmarre
               /*  if(!empty($errors)){
                    foreach($errors as $error){
                        ?>
                        <div class="alert alert-danger"><?=$error .'<br>'?></div>
                        <?php
                    }

                } */
                else{

                    //-----------------------------------------------------------------------
                // on va creer un le traitement pour ajouter le moderateur
                //--------------------------------------------------------
                            
                $tabl = [
                    'name'     =>$name,
                    'email'    =>$mail,
                    'token'    =>$token,
                    'role'     =>$role
                ];

                $sqle = "INSERT INTO admins (name,email,token,role) VALUES (:name,:email,:token,:role)";
                $reqt = $connexion->prepare($sqle);
                $so = $reqt->execute($tabl);
                if($so){
                    
                    $_SESSION['alert'] = "Très bien, L'opération reussie";
                    $_SESSION['alert_code'] = "success";
                    ?>
                    <!-- <div class="alert alert-success">L'opération reussie. Merci</div> -->
                    <?php
                    //-----------------------------------------------------------
                    //envoie du mail une fois le modo est enregistré dans la base
                    //-----------------------------------------------------------
                    $subject = "Rhema-dvine - Ajout du ".$role." dans le site";
                    ob_start(); 
                    require_once 'mail.php';

                    $message = ob_get_clean();
                    $header = "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html; charset-utf-8\r\n";
                    $header .= 'From: ne-pas-repondre@rhema-divine.com' . "\r\n" . 'Réponse-à: contact@rhema-divine.com'  ."\r\n"; 

                    mail($mail, $subject,$message,$header);
                }else {
                    $_SESSION['alert'] = "L'opération échouée. Désolé";
                    $_SESSION['alert_code'] = "error";
                    ?>
                   <!--  <div class="alert alert-danger">L'opération échouée. Désolé</div> -->
                    <?php
                }
                        
                }

            
            
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom Complet</label>
                    <input type="text" id="nom" name="nom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mail">Adresse mail</label>
                    <input type="email" id="mail" name="mail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mail2">Répeter l'adresse mail</label>
                    <input type="email" id="mail2" name="mail2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="role">Sélectionner le Role</label>
                    <select name="role" id="role" class="custom-select">
                        <option value="Administrateur">Administrateur</option>
                        <option value="Moderateur">Modérateur</option>
                        <option value="Redacteur">Rédacteur</option>
                    </select>
                </div>
                <button class="btn btn-outline-primary btn-lg" type="submit" name="submitSetting"><i class="far fa-plus-square mr-2 ml-1"></i>Créer</button>
            </form>
        </div>
    </div>
    <hr>
    <h2 class="mt-3">Controles Commentaires</h2>
    <?php 
            $comments =  getCommentsValid();
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
                    <td class="text-right">
                        <a href="#" commentaire ="<?=$comment->commentaire ?>" id="<?= $comment->id ?>" class="btn btn-success btn-sm valide_com"><i class="fas fa-check"></i></a>
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
                    <!-- <div class="alert alert-danger">Acun Commentaire à validé, Merci</div> -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention ! </strong>Acun Commentaire à validé, Merci.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <?php 
                }?>
                
            </tbody>
        </table>
</div>

