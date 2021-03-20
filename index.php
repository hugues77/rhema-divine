<?php
  require_once 'vendor/autoload.php';
  session_start();
  require_once 'functions/main-functions.php';
  //require_once 'pages/connection.php';
  
/**
 * indexation de page function de chaque page PHP
 */
  // $pages_functions = scandir('functions/');
  // if(in_array($page.'.func.php',$pages_functions)){
  //   include 'functions/'.$page.'.func.php';
  // }

 /**
  * on demarre le router dynamique
  */
 $router = new AltoRouter();
  $router->map('GET', '/','home');
  $router->map('GET', '/nous-contacter','sommes','contact_nom');
  $router->map('GET', '/escalier-tentation','livre');
  $router->map('GET', '/bible','bible');
  $router->map('GET', '/predications', 'predications');
  $router->map('GET', '/musiques','musiques');
  $router->map('GET', '/[*:slug]-[i:id]', 'publication','article');

  $match = $router->match();

  if(is_array($match)){
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
    
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }else{
        $params = $match['params'];
        require "pages/{$match['target']}.php";
    }
    
}else{
    require_once 'pages/error.php'; 
  }
  require_once 'pages/creation_site.php'; 
  require_once 'body/footer.php';
