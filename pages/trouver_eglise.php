<?php
    if(isset($_POST['trouver'])){
        $_SESSION['alert'] = "Cette page est en construction, Nous travaillons pour vous";
        $_SESSION['alert_code'] = "success";
    }
  ?>
<section class="bg-tchat">
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Rétrouvez une église en un clic sur rhema divine.</h1>
            <p class="lead text-muted">Retrouvez une ou des église(s) les plus proches de chez vous ; découvrez les cultes, activités et prochains événements qu’elles proposent !</p>
            <form action="" method="POST" class="form-row">
                <div class="col-md-5">
                    <input class="form-control" name="ville" type="text" placeholder="Entrer la ville">
                </div>
                <div class="col-md-5">
                    <input class="form-control" name="eglise" type="text" placeholder="Entrer l'église">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-secondary" name="trouver" type="submit">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</section>


<?php //require_once 'pages/creation_site.php';
      //require_once 'footer.php';?>