<div class="containner-fluid bg-inscription">
    			<!--titre d'inscription-->
		<div class="jumbotron text-center">
			<div class="container">
			<h1 class="jumbotron-heading">S'inscrire!</h1>
			<p class="lead text-muted">Créer un compte rhema divine, c'est facile!! et ca vous prends seulement une minutes, Allez-y et profitez des fonctionnalités plus avancées.</p>
			</div>
		</div>

            <?php
            if(isset($_POST['submit'])){
                ///définir les variables des données
                $sexe = htmlspecialchars(trim($_POST['sexe']));
                $nom = htmlspecialchars(trim($_POST['nom']));
                $prenom = htmlspecialchars(trim($_POST['prenom']));
                $pseudo = htmlspecialchars(trim($_POST['pseudo']));
                $email = htmlspecialchars(trim($_POST['email']));
                $naissance = htmlspecialchars(trim($_POST['naissance']));
                $religion = htmlspecialchars(trim($_POST['religion']));
                $aujourdhui = date("Y");
                $age_naissance = date('Y',strtotime($naissance));
                $age_user = ($aujourdhui)-($age_naissance);
                $token = token($nom);
               $errors = [];
               if(empty($nom) || empty($prenom) || empty($sexe) || empty($pseudo) || empty($email)|| empty($naissance) || empty($religion)){
                   $errors['empty'] = "Merci de renseigner tous les champs svp";
               }
               if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                   $errors['email'] = "L'adresse email renseigner n'est pas valable";
               }
               if($age_user < 16){
                   $errors['date'] = "Veuillez à utiliser votre vraie date de naissance; Vous devriez avoir 16 ans ou plus pour s'inscrire, Merci";
               }
               if(user_exist($email,$pseudo)){
                   $errors['user'] = "L'adresse e-mail ou Pseudo déjà assignée, Merci d'en trouver un autre";
               }
               if(!empty($errors)){
                   foreach($errors as $error){
                       ?>
                       <div class="row">
                            <div class=" col-md-8 offset-2 alert alert-danger"><?=$error?></div>
                       </div>
                       <?php
                   }
               }else{
                   $sql = "INSERT INTO membre(nom,prenom,pseudo,sexe,email,date_naissance,religion,token) VALUES (?,?,?,?,?,?,?,?)";
                   $req = $connexion->prepare($sql);
                   $result = $req->execute(array($nom,$prenom,$pseudo,$sexe,$email,$naissance,$religion,$token));
                   if($result){
                       ?>
                       <script>window.document.location="index.php?page=confirm";</script>";
                       <?php
                   }
               }
            }
            ?>
    <div class="row ">
        <div class="col-md-8  offset-2">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 bg-danger">

                    </div>
                    <div class="col-md-8 bg-dark">
                        <form action="" method="POST" class="form-group  p-5  text-light">
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" class="form-check-input" checked id="materialInline1" value="homme">
                                <label class="form-check-label" for="materialInline1">Homme</label>
                            </div>

                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" class="form-check-input" id="materialInline2" value="femme">
                                <label class="form-check-label" for="materialInline2">Femme</label>
                            </div>
                            <h5 class="mt-2">Profil</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  class="form-control mt-2" name="prenom" placeholder="prénom">
                                </div>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control mt-2" name="nom" placeholder="nom">
                                </div>
                            </div>
                            <input type="text"  class="form-control mt-2" name="pseudo" placeholder="pseudo">
                            <input type="email"  class="form-control mt-2" name="email" placeholder="e-mail">
                            <div class="form-group">
                                <label for="date"><h5 class="mt-2">Date de naissance</h5></label><br>
                                <input id="date" type="date"  class="form-control " name="naissance" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="select"><h5 class="mt-2">Appartenance réligieuse</h5></label><br>
                                <select class="form-control" name="religion" id="select">
                                    <option value="">Choisir...</option>
                                    <option value="evangelique">Evangélique</option>
                                    <option value="protestant">Protestant</option>
                                    <option value="catholique">Catholique</option>
                                    <option value="musulman">Musulman</option>
                                </select>
                            </div>
                            <small class="text-danger">En cliquant sur Inscription, vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.</small>
                            <div class="row">
                                <div class="col-md-4">
                                    <button  type="submit" name="submit" class="btn btn-primary mt-2 btn-block ">Inscription</button>
                                </div> 
                            </div>
                            
                        </form><br><br>
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
