<?php
  require_once 'vendor/autoload.php';
  session_start();
  //require_once 'functions/main-functions.php';
  //require_once 'pages/connection.php';
  
/**
 * indexation de page function de chaque page PHP
 */
  $pages_functions = scandir('functions/');
  if(in_array($page.'.func.php',$pages_functions)){
    include 'functions/'.$page.'.func.php';
  }

/**
 * on charge le Header topbar + Image_entete
 */
 require_once 'body/topbar.php'; 
 ?><br>
<!-- entete image -->
  <section class="mt-5 phone_cache">
     <img class="card-img-top mt-4" src="images/rhemaEntete1.png" alt="rhema divine" width="1350px" height="300px" >
  </section>
 <!-- fin entete image --> 
 <?php
 /**
  * on demarre le router dynamique
  */
 $router = new AltoRouter();
  $router->map('GET', '/', function(){
    require_once 'pages/home.php';
  });
  $router->map('GET', '/nous-contacter', function(){
    require_once 'pages/sommes.php';
  });
  $router->map('GET', '/blog/[*:slug]-[i:id]', function($slug, $id){
     echo "je suis sur l'article : $slug avec un id numéro : $id";
  });

  $match = $router->match();
  if($match !== null){
    call_user_func_array($match['target'], $match['params']);
    //$match['target']();
  }

//require_once 'pages/'.$page.'.php'; 
require_once 'pages/creation_site.php'; 
require_once 'footer.php';

