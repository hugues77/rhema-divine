<?php
//require_once 'pages/creation_site.php'; ?>
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Rhema divine</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p class="text-justify">Le site de révélation qui veut simplement dire la révélation de Dieu.</p>
         <p class="text-justify">Une seule chaine et une révélation nous suffit. Psaumes 119 v.130</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">En savoir Plus</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="http://rhema-divine.com/index.php?page=predications">Prédications</a>
        </p>
        <p>
          <a href="http://rhema-divine.com/index.php?page=musiques">Musiques</a>
        </p>
        <p>
          <a href="http://www.softhandy.fr/">Dévelloppement web</a>
        </p>
        <p>
          <a href="#!">Nos parténaires</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Liens Utiles</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Les Deux Omers</a>
        </p>
        <p>
          <a href="http://rhema-divine.com/index.php?page=inscription">Dévenir Membre</a>
        </p>
        <p>
          <a href="https://www.paypal.com/donate?token=SXdX3-7gduOt7SwgV1iqK6uFOX1RO1axzzp68clphdqZWzGXaz-kQdnpGmvZbuBUZpkt_0BOV7ufX8ua">Faire Un Don</a>
        </p>
        <p>
          <a href="http://rhema-divine.com/index.php?page=sommes">A propos</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Metz, 57000, France</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> contact@rhema-divine.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 33 7 82 78 77 09</p>
        <p>
        <i class="fab fa-whatsapp mr-3"></i> +33 6 51 29 46 92</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="bg-primary footer-copyright text-center py-3">© 2020 Copyright:
    <a href="http://www.softhandy.fr/" target="_blank" class="text-white"> Softhandy, Leader du web International</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
 <!-- fin section softhandy -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js"></script>
    <script type="text/javascript" src="js/video_bas.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>
  
    <?php
        $pages_js = scandir('js/');
        if(in_array($page.'.func.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/<?=$page ?>.func.js"></script>
        <?php }
        //pour page index.js
        //$pages_js = scandir('js/');
        if(in_array('index.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/index.js"></script>
        <?php }
        //js pour tchat
        if(in_array('messagerie.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/messagerie.js"></script>
        <?php }
         //js pour inscription
         if(in_array('inscription.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/inscription.js"></script>
        <?php }
         //js pour menu
         if(in_array('topbar.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/topbar.js"></script>
        <?php }
         //js pour prédication
         if(in_array('predications.js',$pages_js)){ ?>
          <script type="text/javascript" src="js/predications.js"></script>
        <?php }

    ?>

    <?php
    //affichage des erreurs avec sweetalert 
    if(isset($_SESSION['alert']) && ($_SESSION['alert'] != '')){
      ?>
       <script>
          swal({
              title: "<?=$_SESSION['alert'];?>",
              //text: "You clicked the button!",
              icon: "<?=$_SESSION['alert_code']?>",
              button: "Ok, c'est compris!",
            });
        </script>
      <?php
      unset($_SESSION['alert']);
    }
    ?>
       <script>
        $(document).ready(function(){
          //declaration de popover(pour la photo profil user) 
        $('.myPopover').popover();
        
        });
    </script>
  </body>
</html>