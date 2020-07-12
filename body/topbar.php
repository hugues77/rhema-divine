<?php
   
    include 'main-functions.php';
    $heure = date("H:i"); 
    
    /**
     * conexion a la base de données pour recuperer photo de profil
     * et le nom, connecté en tant que..
     */
    if(isset($_SESSION['email']) || isset($_SESSION['pseudo'])){
        $req = "SELECT * FROM membre WHERE email ='{$_SESSION['email']}' OR pseudo ='{$_SESSION['pseudo']}' ";
        $profil = $connexion->query($req);
        $res = $profil->fetchAll(PDO::FETCH_OBJ);
    }
    
    ?>

<html lang="fr_FR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
    <link rel="stylesheet" href="css/tchat.css" type="text/css"/>
    <script src="https://kit.fontawesome.com/bdf8dcd65d.js"></script><!-- Ici j'ai inserer lekit fontAwesome -->
    <title>rhema divine!</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
</head>
<body>
    
<!--heure +date -->
<div class="fixed-top">
    <div class="container-fluid phone_cache">
        <div class="row bg-light">
            <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6 bg-light"></div>
            <div class="col-md-6 heure text-light">
                    <div class="ml-2"> <a href="https://www.facebook.com/rhema.divine/"><img src="images/facebook.png" width="5%"/></a> <a href="https://twitter.com/HEvangeliste"><img src="images/twitter.png" width="5%"/></a> <a href="https://www.youtube.com/c/RhemaDivine"><img src="images/youtube.png" width="5%"/></a> <a href="https://www.instagram.com/handyevangeliste/"><img src="images/instagram.png" width="5%"/></a> | Nous sommes, 
                        <?php  
                        
                        setlocale(LC_TIME, 'fr_FR');
                        date_default_timezone_set('Europe/Paris');
                        echo strftime("%A %d %B %Y" . "  " . ' <span class="ml-2 pl-3 pr-3 btn btn-danger">'. $heure .' </span>'.' '); 
                        
                        //On affiche proto profil et pseudo de l'utilisateur connectés
                         if(isset($_SESSION['email']) || isset($_SESSION['pseudo'])){
                            foreach($res as $profil){
                                $_SESSION['nom'] = $profil->nom;
                                $_SESSION['prenom'] =$profil->prenom;
                               echo ' <span class="myPopover" id="action_topbar_btn" data-toggle="popover" data-placement="right" title="Vous etes connectés" data-trigger="hover"><img class="rounded-circle user_profil ml-3" src="images/tchat/'.$profil->image.'"/>'.' '.$profil->pseudo.'</span>';
                            }
                         } else{
                            echo '<span id="html"><a href="#exampleModal"  class="" data-toggle="modal" data-backdrop="static" data-target="#exampleModal" ><div class="btn btn-outline-danger ml-2">Se Connecter</div></a></span> ' ; 
                         } 
                        ?> 
                    </div>
                    <div class="action_topbar">
						<ul>
						    <li><i class="fas fa-user-circle mr-2"></i> Voir mon profil</li>
							<li><i class="fas fa-cogs mr-2"></i> Paramètres du compte</li>
							<li><i class="fas fa-question-circle mr-2"></i> Aide et Assistance</li>
							<li><i class="fas fa-power-off mr-2"></i><a href="index.php?page=logout"> Se déconnecter</a></li>
						</ul>
					</div>
            </div>
        </div>
    </div>
    <!-- menu-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php"><img src="images/rd.png" class="rounded" width="15%"/>Rhema divine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo($page == "index") || (isset($index))? "active": ""  ?>">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo($page == "predications") ||($page == "publication")? "active" : "" ?>">
                    <a class="nav-link" href="index.php?page=predications">Prédications</a>
                </li>
                <li class="nav-item <?php echo($page == "messagerie")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=messagerie">Messagerie</a>
                </li>
                <li class="nav-item <?php echo($page == "bible")? "active": ""  ?>">
                    <a class="nav-link" href="https://emcitv.com/bible/lire-la-bible.html" target="_blank">Lire la Bible</a>
                </li>
                <li class="nav-item <?php echo($page == "trouver_eglise")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=trouver_eglise">Trouvez une église</a>
                </li>
                <li class="nav-item <?php echo($page == "sommes")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=sommes">Nous sommes</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div> 
  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Poursuivre avec Facebook <img src="images/facebook.png" width="7%" alt=""></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
            <div class=" mt-2 mb-2">
                <div class="mt-2 text-center">
                    <img src="images/user-female.png" alt="Modérateur" class="text-center " width="160px">
                </div>
                <h4 class="text-center mt-2">Se connecter</h4>
                <form action="index.php?page=conn_members" method="POST" class="form-group">
                    <input type="text"  class="form-control" id="email" name="email" placeholder="votre e-mail ou pseudo">
                    <input type="password"  class="form-control mt-2"  id="password" name="password" placeholder="votre Mot de passe">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <span class=""><a href="">Mot de passe oublié</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="submit" id="connexionMembre" class="btn btn-primary mt-2 btn-block ">connexion</button>
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
  </div>
</div>
   