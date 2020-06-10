<?php
session_start();
    include 'functions/main-functions.php';
    
    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
      if(in_array($_GET['page']. '.php',$pages)){
        $page = $_GET['page'];
      }else{
        $page = "error";
      }
    }else{
      $page = "login";
    }


    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
      include 'functions/'.$page.'.func.php';
    }
  
    //empecher aux visiteurs d'ouvrir la page dashboard

  if($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])){
    header("Location:index.php?page=login");
  }
 require_once 'topbar/menu.php'; ?>

<div class="">
    <?php require_once 'pages/'.$page.'.php'; ?>
</div>



 
<?php
require_once 'pages/creation_site.php';
require_once '../footer.php';

?>