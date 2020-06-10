<?php
//$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
//$heure = date("H:i"); 
if(isset($_SESSION['admin'])){
$req = $connexion->query("SELECT profil FROM admins WHERE email ='{$_SESSION['admin']}'  ");
$res = $req->fetchobject();
}
?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
    
    <script src="https://kit.fontawesome.com/bdf8dcd65d.js"></script><!-- Ici j'ai inserer lekit fontAwesome -->
    <title>Admin</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning text-left justify-content-between">
  <a class="navbar-brand" href="../index.php?page=index"><img src="../images/rd.png" class="rounded" width="15%"/>Rhema divine</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <?php
        if($page != 'login' && $page !='new' && $page != 'password'){
          ?>
    <ul class="navbar-nav mr-auto">
      
        <li class="nav-item <?php //echo($page = 'dashboard') ? "active" : ''; ?>">
          <a class="nav-link" href="index.php?page=dashboard"><h5 class="justify-content-center align-items-center"><i class="fab fa-microsoft  text-primary  mr-1"></i>Dashboard</h5></a>
        </li>
        <?php
          if(admin() == 1){
        ?>
        <li class="nav-item <?php //echo($page = 'list') ? "active" : ''; ?>">
          <a class="nav-link" href="index.php?page=list"><h5 class="justify-content-center align-items-center"><i class="fas fa-list text-primary  mr-1"></i>Listes</h5></a>
        </li>
        <li class="nav-item <?php //echo($page = 'setting') ? "active" : ''; ?>">
          <a class="nav-link" href="index.php?page=setting"><h5 class="justify-content-center align-items-center"><i class="fas fa-user-cog text-primary  mr-1"></i>Réglages</h5></a>
        </li>
        <?php 
          }
        if(redacteur() == 1 || admin() == 1){
          ?>
        <li class="nav-item <?php //echo($page = 'write') ? "active" : ''; ?>">
          <a class="nav-link" href="index.php?page=write"><h5 class="justify-content-center align-items-center"><i class="far fa-keyboard text-primary  mr-1"></i>Poster</h5></a>
        </li>
       <?php
          }
        if(moderateur() == 1 || (admin() == 1)){
       ?>
      <li class="nav-item <?php //echo($page = 'home') ? "active" : ''; ?>">
        <a class="nav-link" href="index.php?page=omers"><h5 class="justify-content-center align-items-center"><i class="fas fa-pencil-alt mr-1 text-primary "></i>Deux Omers </h5><span class="sr-only">(current)</span></a>
      </li>
      <?php
        }
      ?>
      <li class="nav-item <?php //echo($page = 'home') ? "active" : ''; ?>">
        <a class="nav-link" href="../index.php?page=index"><h5 class="justify-content-center align-items-center"><i class="fas fa-external-link-alt mr-1 text-primary "></i>voir le site </h5><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php //echo($page = 'logout') ? "active" : ''; ?>">
        <a class="nav-link" href="index.php?page=logout"><h5 class="justify-content-center align-items-center"><i class="fas fa-sign-out-alt mr-1 text-primary "></i>Déconnexion</h5></a>
      </li>
    </ul>
    <div>
      <img src="../images/<?=$res->profil?>" class="rounded-circle" width="40px" alt="">
    </div>
    <?php
        }
      ?>
  </div>
</nav>
    
