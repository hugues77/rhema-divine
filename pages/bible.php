<?php
    require_once 'connection.php';
    $title = "la bible direct de rhema divine!"
    ?>
<section class="bg-bible">
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">La bible électronique de Rhema divine !</h1>
            <p class="lead text-muted">Bienvenue dans la plateforme de Méditation quotidienne de rhema divine, Lance-vous dans la lecture et méditation en utilisant la recherche automatique des chapitres.</p>
        </div>
    </div>
    <!-- <div class="row ">
        <div class="col-md-3  menu-bible">
            <div>
                <h3 class="alert alert-primary mt-2">Menu</h3>
                <h6><ul class="bg-dark list-group list-group-flush">
                    <li class="list-group-item list-group-item-primary"><i class="fas fa-book-reader mr-2"></i>Lire la bible</li>
                    <li class="list-group-item"><i class="fas fa-table mr-2"></i>Table des Matières</li>
                    <li class="list-group-item list-group-item-primary"><i class="fab fa-readme mr-2"></i>Lecture quotidienne</li>
                    <li class="list-group-item"><i class="fas fa-info-circle mr-2"></i>A propos</li>
                </ul></h6>
            </div>
        </div>
        
    </div>   -->

    <!-- Traitement PHP  -->

    <div class="container">
        <form action="index.php?page=result" method="POST" class="">
            <div class="input-group mb-2"> 
                <input type="text" name="recherche_verset" placeholder="votre recherche rapide"  class="form-control" id="inlineFormInputGroup">
                <div class="input-group-prepend">
                    <button type="submit" name="btn_recherche" class="input-group-text btn btn-primary">valider</button>
                </div>
            </div>
        </form>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Les Evangiles
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach($eva as $ev):?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a class="text-decoration-none" href="index.php?page=lire&livre=<?=$ev->livre?>"><?=$ev->livre?></a>
                                <span class="badge bg-primary rounded-pill">28</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Actes des Apôtres
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach($actes as $acte):?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="text-decoration-none" href="index.php?page=lire&livre=<?=$acte->livre?>"><?=$acte->livre?></a>
                                    <span class="badge bg-primary rounded-pill">28</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Epîtres de Paul
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach($epitres as $epitre):?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="text-decoration-none" href="index.php?page=lire&livre=<?=$epitre->livre?>"><?=$epitre->livre?></a>
                                    <span class="badge bg-primary rounded-pill">14</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Autres Epîtres
                </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <?php foreach($autres as $autre):?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none" href="index.php?page=lire&livre=<?=$autre->livre?>"><?=$autre->livre?></a>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        Livre de la Révélation
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach($revelat as $rev):?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="text-decoration-none" href="index.php?page=lire&livre=<?=$rev->livre?>"><?=$rev->livre?></a>
                                    <span class="badge bg-primary rounded-pill">22</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>