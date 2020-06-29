<?php
                if(isset($_POST['submit'])){
                    $nom = htmlentities(trim($_POST["email"]));
                    $pseudo = htmlentities(trim($_POST["email"]));
                    $pswd = htmlentities(trim($_POST["password"]));
                    $errors = [];

                    if(empty($nom) || empty($pswd)){
                        $errors['empty'] = "Vous devez remplir tous les champs svp";
                    }
                    /**
                     * verifier si le pseudo ou email existe dans la base
                     */
                    $tab = [
                        'email'  =>$nom,
                        'pseudo'  =>$pseudo,
                        'password'=>sha1($pswd)
                    ];
                    $sql = "SELECT * FROM membre WHERE (email=:email OR pseudo=:pseudo) AND password=:password";
                    $req = $connexion->prepare($sql);
                    $req->execute($tab);
                    $rest = $req->rowCount($sql);
                    if(!$rest){
                        $errors['user'] = "Cet utilisateur n'existe pas, Merci de verifier les identifiants svp";
                    }
                    if(!empty($errors)){
                        foreach($errors as $error){
                            ?>
                            <div class="alert alert-danger"><?=$error?></div>
                            <?php
                        }
                    }else{
                       $_SESSION['email'] = $nom;
                       $_SESSION['pseudo'] = $pseudo;
                       ?>
                       <script>window.document.location="index.php?page=index";</script>";
                       <?php
                    }
                }
            ?>
