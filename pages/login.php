<?php
                if(isset($_POST['submit'])){
                    $nom = htmlentities(trim($_POST["email"]));
                    $pseudo = htmlentities(trim($_POST["email"]));
                    $pswd = htmlentities(trim($_POST["password"]));
                    $errors = [];

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

                    if(empty($nom) || empty($pswd)){
                        $errors['empty'] = "Vous devez remplir tous les champs svp";
                        
                    }

                    elseif(!$rest){
                        $errors['user'] = "Cet utilisateur n'existe pas, Merci de verifier vos identifiants svp";
                    }
                    
                    if(!empty($errors)){
                        foreach($errors as $error){
                            $_SESSION['alert'] = $error;
                            $_SESSION['alert_code'] = "error";
                            ?>
                            <!-- <div class="alert alert-danger"></div> -->
                            <?php
                        }
                    }else{
                        $resp = $req->fetchAll(PDO::FETCH_OBJ); 
                        foreach($resp as $row)
                        {
                            $_SESSION['email'] = $row->email;
                            $_SESSION['pseudo'] = $row->pseudo;
                            $_SESSION['nom'] = $row->nom;
                            $_SESSION['prenom'] = $row->prenom;
                            $_SESSION['image'] = $row->image;
                            $_SESSION['id_membre'] = $row->id_membre;
                            $sub_query = "INSERT INTO membre_details (id_membre) VALUES (' ".$_SESSION['id_membre']."')";
                            $statement = $connexion->prepare($sub_query);
                            $statement->execute();
                            $_SESSION['id_membre_details'] = $connexion->lastInsertId();
                            ?>
                         <script>window.document.location="index.php?page=index";</script>";
                       <?php
                        }
                        
                    }
                }
            ?>

<!-- <section class="connectdata">
    <div class="container">
        <div class=" mt-2 mb-2">
            <div class="mt-2 text-center">
                <img src="images/user-female.png" alt="Modérateur" class="text-center " width="160px">
            </div>
            <h4 class="text-center mt-2">Se connecter</h4>
            
        </div>   
    </div>
</section> -->


<div class="containner-fluid bg-inscription">
    			<!--titre d'inscription-->
		<div class="jumbotron text-center">
			<div class="container">
			<h1 class="jumbotron-heading">Se connecter</h1>
			<p class="lead text-muted">Avec vos identiants rhema divine, connectez-vous en un clic, Allez-y et profitez des fonctionnalités plus avancées.</p>
			</div>
		</div>
    <div class="row ">
        <div class="col-md-8  offset-2">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images/tchat/welcome.png" width="300px" height="450px" alt="se connecter sur rhema-divine">
                    </div>
                    <div class="col-md-8 bg-dark">
                    
                    <form action="" method="POST" class="form-group connexionlogin">
                        <h2 class="text-danger">Identification</h2>
                        <input type="text"  class="form-control "  name="email" id="email" placeholder="votre e-mail ou pseudo">
                        <input type="password"  class="form-control mt-2"  name="password" id="password"  placeholder="votre Mot de passe">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label text-primary" for="exampleCheck1">Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <span class=""><a href="">Mot de passe oublié</a></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="submit"  id="connexion_membre" class="btn btn-primary mt-2 btn-block ">connexion</button>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php?page=inscription" type="submit" name="submit" class="btn btn-primary mt-2 btn-block ">créer un compte</a>
                            </div>
                        </div> 
                        </form>  
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class=" col-md-5 mt-5 ">
           <div class="justify-content-center align-items-center ml-5">
                <img src="images/pasteur.png" width="400px" alt="">
           </div>
        </div> -->
    </div>
</div>


      
   