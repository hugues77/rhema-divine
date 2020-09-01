<?php
   session_start();
    //include 'functions/main-functions.php';
    include 'functions/main.php';
    
    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
      if(in_array($_GET['page']. '.php',$pages)){
        $page = $_GET['page'];
      }else{
        $page = "error";
      }
    }else{
      $page = "index";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
      include 'functions/'.$page.'.func.php';
    }
?>

<?php require_once 'body/topbar.php'; ?><br>

<!-- entete image -->
  <section class="mt-5 phone_cache">
    <img class="card-img-top mt-4" src="images/rhemaEntete.png" alt="rhema divine" width="1350px" height="450px" >
  </section>
<!-- fin entete image --> 

<?php include 'pages/'.$page.'.php'; 
require_once 'pages/creation_site.php';
require_once 'footer.php';
?>
