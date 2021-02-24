<?php
    //require_once '../header.php'; 
  ?>
    <header class="header6">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="container">
                       
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Qui sommes nous, Rhema-divine.</h1>
          <p class="lead text-muted">Comprendre clairement et honnetement la raison  naturelle de l'existence du site rhema divine et son équipe; Une seule chaine et une révélation nous suffit.</p>
          
        </div>
    </section>
    <section class="container">
        <div class="row text-justify">
            <div class="mt-1 col-xs-12 col-lg-6 col-sm-12 col-md-6">
                <p> <div class="mt-1 text-center text-primary"><i class="fas fa-users-cog fa-3x"></i></div><br>Il était une fois à Metz aux environs des années 2015,Ce site est l'initiative de votre Serviteur Handy,frère Boris et le frère Freddy qui est notre excellent réalisateur.
                    Ce site est un portail de  diffusion des informations rélatives  à la bonne nouvelle de jésus-christ  ou  de tout ce qui se passe dans des églises de  christ.<br><div class="text-center text-primary"><i class="fab fa-teamspeak text-primary text-right fa-3x"></i></div><br>
                    Nous avons  pu remarquer à travers  le monde, il en existe  des sites web gratuit qui diffusent des  informations  pouvant amener les enfants de Dieu  dans le péché (des  sites pornographiques et  d'autres sites similaires)
                    Nous avons encore remarquer  certains sites  diffusent des informations pouvant décourager  ou ébranler   la foi  de plusieurs, c'est-à-dire  de tels site  nous montre  que  les mauvaises actions   de  ceux qui se disent serviteur de Dieu et qui ne les sont pas et certaines émissions ou prédications  qui ne tiennent pas la route   avec la  doctrine de notre seigneur Jésus-Christ. </p><br>
            </div>
                <div class="mt-1 col-md-6 col-xs-12 col-sm-12 col-lg-6">
                    <p>En revanche, il en existe  des  vrais hommes Dieu qui sont choisis, appellés et établies  par le   seigneur  jésus-christ car la bible dit: <span class="text-danger">"Car il y a des eunuques qui le sont dès le ventre de leur mère; il y en a qui le sont devenus par les hommes; et il y en a qui se sont rendus tels eux-mêmes, à cause du royaume des cieux"</span> Or s'il y a des faux , il y a aussi des vrais.
                    C'est par là que nous reconnaissons  le mensonge et la vérité mais comment ces vrais hommes de   Dieu  qui ont la révélation de jésus-christ pourront encourager les enfants de Dieu à persévérer dans  la foi en   christ?
                    <div class="mt-1 text-center text-primary"><i class="fab fa-weixin fa-3x"></i></div><br> Il est vrai qu'il y a des sites purement chrétiens et qui diffusent  des informations édifiantes mais  ceux-ci sont quasiment payant avant de passer à l’émission ou prêcher jésus-christ, et comment ces  hommes spirituelles qui n'ont pas de sou, pourront  parler de Dieu ? si les sites pornographiques le  font  gratuit, pourquoi pas nous les chrétiens ?
                    Il m'appartient donc de vous signaler que  le présent site est pour l'édification des chrétiens en   vue   du salut par la parole de Dieu au travers cette espace virtuel et cela est gratuit aujourd'hui  et ça restera gratuit !!!

                </div>
        </div>
    </section>
      
      <!-- inserer formulaire here + Maps -->
    <div class="container-fluid bg-dark">    
        <section class="container py-3 ">
            <h1 class="jumbotron-heading text-center"></h1>
                <!-- traitement des données en php-->
                <?php
                    if (isset($_POST['submit'])) {
                        $nom = htmlspecialchars(trim($_POST['nom']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $sujet = $_POST['sujet'];
                        $message = htmlspecialchars(trim($_POST['message']));
                        $moi = isset($_POST['send']) ? '1' : '';
                        $destinateur = "contact@rhema-divine.com";
                        $header="MIME-Version:1.0\r\n";
                        $header.='From:"http://rhema-divine.com"<contact@rhema-divine.com>'."\n";
                        $header.='Content-Type:text/html; charset="utf-8"'."\n";
                        $header.='Content-Transfert-Encoding:8bit';
                        ob_start();
                        require_once 'mail_contact.php';
                        $corps_message = ob_get_clean();
                        if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
                            $_SESSION['alert'] = "vous devrez remplir tous les champs svp";
                            $_SESSION['alert_code'] = "error";
                 
                        }else {
                            # code envoie mail...
                            Mail($destinateur, $sujet,$corps_message,$header);
                            $_SESSION['alert'] = "votre message a été envoyé avec succès";
                            $_SESSION['alert_code'] = "success";
                            if ($moi === 1) {
                                # code envoie mail à moi meme aussi...
                                Mail($email, $sujet,$corps_message,$header);
                            }
                        }
                    
                    }
                ?>
                <div class="row text-justify">
                    <div class="col-xs-12 col-sm-12 col-lg-5 col-md-5">
                        <!-- Material form contact -->
                        <div class="card">

                            <h5 class="card-header info-color white-text text-center py-4">
                                <strong>Contactez-nous</strong>
                            </h5>

                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0">

                                <!-- Form -->
                                <form class="text-center" style="color: #757575;" action="" method="POST">
                                    <!-- Name -->
                                    <div class="form-group mt-3">
                                        <label for="materialContactFormName">Nom complet</label>
                                        <input type="text" id="materialContactFormName" name="nom" class="form-control">
                                        
                                    </div>

                                    <!-- E-mail -->
                                    <div class="form-group">
                                        <label for="materialContactFormEmail">E-mail</label>
                                        <input type="email" id="materialContactFormEmail" name="email" class="form-control">
                                        
                                    </div>

                                    <!-- Subject -->
                                    <span>Sujet du Message</span>
                                    <select class="custom-select" name="sujet">
                                        <option value="">Chosir une option</option>
                                        <option value="Démande de prière">Démande de prière</option>
                                        <option value="Question pour une vidéo">Question pour une vidéo</option>
                                        <option value="Problème lié à l'informatique">Problème lié à l'informatique</option>
                                        <option value="Autres Problème">Autres</option>
                                    </select>

                                    <!--Message-->
                                    <div class="form-group">
                                        <label for="materialContactFormMessage">Message</label>
                                        <textarea id="materialContactFormMessage" class="form-control"  name="message" rows="3"></textarea>
                                    </div>

                                    <!-- Copy -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="materialContactFormCopy" name="send">
                                        <label class="form-check-label" for="materialContactFormCopy">Envoyez-moi une copie de ce message</label>
                                    </div>

                                    <!-- Send button -->
                                    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">Envoyer</button>

                                </form>
                                <!-- Form -->

                            </div>

                        </div>
                        <!-- form Maps Adresse -->
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2610.6191327259767!2d6.162580414988722!3d49.13186818936674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4794d94d17910c6f%3A0xee30fdc7901bb4c3!2s5%20Rue%20Pierre%20Mouzin%2C%2057050%20Metz!5e0!3m2!1sfr!2sfr!4v1574718789071!5m2!1sfr!2sfr"
                                width="650" height="506" frameborder="0" style="border-radius:10px" allowfullscreen=""></iframe> 
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>


