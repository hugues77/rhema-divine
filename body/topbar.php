<?php
   
    require_once 'main-functions.php';
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

    <!-- Bootstrap4 CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     -->
     <!-- Bootstrap5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <div class="col-xs-5 col-sm-5 col-lg-5 col-md-5 bg-light"></div>
            <div class="col-md-7 col-sm-7 col-lg-7 col-md-7 heure text-light">
                    <div class="ml-2"> <a href="https://www.facebook.com/rhema.divine/"><img src="images/facebook.png" width="5%"/></a> <a href="https://twitter.com/HEvangeliste"><img src="images/twitter.png" width="5%"/></a> <a href="https://www.youtube.com/c/RhemaDivine"><img src="images/youtube.png" width="5%"/></a> <a href="https://www.instagram.com/handyevangeliste/"><img src="images/instagram.png" width="5%"/></a> | Nous sommes, 
                        <?php  
                        
                        setlocale(LC_TIME, 'fr_FR');
                        date_default_timezone_set('Europe/Paris');
                        echo strftime("%A %d %B %Y" . "  " . ' <span class="ml-2 pl-3 pr-3 btn btn-danger">'. $heure .' </span>'.' '); 
                        
                        //On affiche proto profil et pseudo de l'utilisateur connectés
                         if(isset($_SESSION['email']) || isset($_SESSION['pseudo'])){
                             foreach($res as $re)
                             {
                                 $_SESSION['image'] = $re->image;
                                 $_SESSION['pseudo'] = $re->pseudo;
                            echo ' <span class="myPopover" id="action_topbar_btn" data-toggle="popover" data-placement="right" title="Vous etes connectés" data-trigger="hover"><img class="rounded-circle user_profil ml-3" src="images/tchat/'.$_SESSION['image'].'"/>'.' '.substr(nl2br($_SESSION['pseudo']),0,7).'</span>';
                            }
                         } else{
                            echo '<span id="html"><a href="index.php?page=login"><div class="btn btn-outline-danger ml-2">Se Connecter</div></a></span> ' ; 
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
        <a class="navbar-brand me-3" href="index.php"><img src="images/rd.png" class="rounded ms-1" width="15%"/>Rhema divine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item <?php echo($page == "index") || (isset($index))? "active": ""  ?>">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo($page == "predications") ||($page == "publication")? "active" : "" ?>">
                    <a class="nav-link" href="index.php?page=predications">Prédications</a>
                </li>
                <li class="nav-item <?php echo($page == "musiques") ||($page == "musique")? "active" : "" ?>">
                    <a class="nav-link" href="index.php?page=musiques">Musiques</a>
                </li>
                <li class="nav-item <?php echo($page == "messagerie")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=messagerie">Forum</a>
                </li>
                <li class="nav-item <?php echo($page == "bible")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=bible">La Bible</a>
                </li>
                <li class="nav-item <?php echo($page == "trouver_eglise")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=trouver_eglise">Trouvez une église</a>
                </li>
                <li class="nav-item <?php echo($page == "sommes")? "active": ""  ?>">
                    <a class="nav-link" href="index.php?page=sommes">Nous sommes</a>
                </li>
            </ul>
            <form class="d-flex my-1 ms-5">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div> 
  
