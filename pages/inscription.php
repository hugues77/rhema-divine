<div class="containner-fluid bg-inscription">
    			<!--titre d'inscription-->
		<div class="jumbotron text-center">
			<div class="container">
			<h1 class="jumbotron-heading">S'inscrire!</h1>
			<p class="lead text-muted">Créer un compte rhema divine, c'est facile!! et ca vous prends seulement une minutes, Allez-y et profitez des fonctionnalités plus avancées.</p>
			</div>
		</div>

            <?php
            if(isset($_POST['submit'])){
                ///définir les variables des données
                $sexe = htmlspecialchars(trim($_POST['sexe']));
                $nom = htmlspecialchars(trim($_POST['nom']));
                $prenom = htmlspecialchars(trim($_POST['prenom']));
                $pseudo = htmlspecialchars(trim($_POST['pseudo']));
                $email = htmlspecialchars(trim($_POST['email']));
                $naissance = htmlspecialchars(trim($_POST['naissance']));
                $religion = htmlspecialchars(trim($_POST['religion']));
                $aujourdhui = date("Y");
                $age_naissance = date('Y',strtotime($naissance));
                $age_user = ($aujourdhui)-($age_naissance);
                $token = token($nom);
               //$errors = []; 
               if(empty($nom) || empty($prenom) || empty($sexe) || empty($pseudo) || empty($email)|| empty($naissance) || empty($religion)){
                   //$errors['empty'] = "Merci de renseigner tous les champs svp";
                   $_SESSION['alert'] = "Merci de renseigner tous les champs svp";
                   $_SESSION['alert_code'] = "error";
               }
               elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                  // $errors['email'] = "L'adresse email renseigner n'est pas valable";
                  $_SESSION['alert'] = "L'adresse email renseigner n'est pas valable";
                  $_SESSION['alert_code'] = "error";
               }
               elseif($age_user < 16){
                  // $errors['date'] = "Veuillez à utiliser votre vraie date de naissance; Vous devriez avoir 16 ans ou plus pour s'inscrire, Merci";
                  $_SESSION['alert'] = "Veuillez à utiliser votre vraie date de naissance; Vous devriez avoir 16 ans ou plus pour s'inscrire, Merci";
                  $_SESSION['alert_code'] = "error";
               }
               elseif(user_exist($email,$pseudo)){
                   //$errors['user'] = "L'adresse e-mail ou Pseudo déjà assignée, Merci d'en trouver un autre";
                   $_SESSION['alert'] = "L'adresse e-mail ou Pseudo déjà assigné(e), Merci d'en trouver un(e) autre";
                  $_SESSION['alert_code'] = "error";
               }

               //j'enleve le l'affichage des erreurs sous forme des alert
               //j'introduis le systeme de sweetalert du JS
             /*   if(!empty($errors)){
                   foreach($errors as $error){
                       ?>
                       <div class="row">
                            <div class=" col-md-8 offset-2 alert alert-danger"><?=$error?></div>
                       </div>
                       <?php
                   }
               } */
               else{
                   $sql = "INSERT INTO membre(nom,prenom,pseudo,sexe,email,date_naissance,religion,token) VALUES (?,?,?,?,?,?,?,?)";
                   $req = $connexion->prepare($sql);
                   $result = $req->execute(array($nom,$prenom,$pseudo,$sexe,$email,$naissance,$religion,$token));
                   if($result){
                       //envoyer token par email, pour la confirmation
                                           //-----------------------------------------------------------
                    //envoie du mail une fois le membre est enregistré dans la base
                    //-----------------------------------------------------------
                    $subject = "Nouveau membre dans le site Rhema divine";
                    $message = '
                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                    <head>
                        <!--[if gte mso 9]>
                        <xml>
                            <o:OfficeDocumentSettings>
                            <o:AllowPNG/>
                            <o:PixelsPerInch>96</o:PixelsPerInch>
                            </o:OfficeDocumentSettings>
                        </xml>
                        <![endif]-->
                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <meta name="format-detection" content="date=no" />
                        <meta name="format-detection" content="address=no" />
                        <meta name="format-detection" content="telephone=no" />
                        <meta name="x-apple-disable-message-reformatting" />
                        <!--[if !mso]><!-->
                        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
                        <!--<![endif]-->
                        <title>Token Unique</title>
                        <!--[if gte mso 9]>
                        <style type="text/css" media="all">
                            sup { font-size: 100% !important; }
                        </style>
                        <![endif]-->
                        
                    
                        <style type="text/css" media="screen">
                            /* Linked Styles */
                            body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#0a2641; -webkit-text-size-adjust:none }
                            a { color:#8fc55b; text-decoration:none }
                            p { padding:0 !important; margin:0 !important } 
                            img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
                            .mcnPreviewText { display: none !important; }
                    
                                    
                            /* Mobile styles */
                            @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
                                u + .body .gwfw { width:100% !important; width:100vw !important; }
                    
                                .m-shell { width: 100% !important; min-width: 100% !important; }
                                
                                .m-center { text-align: center !important; }
                                .center { margin: 0 auto !important; }
                                
                                .td { width: 100% !important; min-width: 100% !important; }
                                .h2 { font-size: 35px !important; line-height: 40px !important; }
                                .nav { font-size: 12px !important; line-height: 22px !important; padding: 10px !important; }
                    
                                .m-br-15 { height: 15px !important; }
                                .p0-15-30 { padding: 0px 15px 30px 15px !important; }
                                .p0-20-30 { padding: 0px 20px 30px 20px !important; }
                                .p30-0 { padding: 30px 0px !important; }
                                .p30-20 { padding: 30px 20px !important; }
                                .pb30 { padding-bottom: 30px !important; }
                                .p10 { padding: 10px !important; }
                    
                                .m-td,
                                .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }
                    
                                .m-block { display: block !important; }
                    
                                .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }
                    
                                .column,
                                .column-dir,
                                .column-top,
                                .column-bottom,
                                .column-dir-top { float: left !important; width: 100% !important; display: block !important; }
                    
                                .content-spacing { width: 15px !important; }
                            }
                        </style>
                    </head>
                    <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#0a2641; -webkit-text-size-adjust:none;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#0a2641" class="gwfw">
                            <tr>
                                <td align="center" valign="top" style="padding: 50px 10px;" class="p10">
                                    <table width="650" border="0" cellspacing="0" cellpadding="0" class="m-shell">
                                        <tr>
                                            <td class="td" bgcolor="#ffffff" style="border-radius: 12px; width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                <!-- Main -->
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <!-- Header -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="p30-20" style="padding: 40px 50px;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <th class="column-top" width="120" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td class="logo m-center img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/rd.png" width="40" height="30" border="0" alt="" /></td>
                                                                                            
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>
                                                                                <th style="padding-bottom: 20px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
                                                                                <th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                                    <td><h6>Bonjour '.$prenom.' ;Bienvenue dans l\'espace membre Rhema divine</h6></td>
                                                                                </th>
                                                                                <th style="padding-bottom: 20px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
                                                                                <th class="column-top" width="120" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td align="right">
                                                                                                <table class="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                                                                                                    <tr>
                                                                                                        <td class="img" width="22" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/ico_web.jpg" width="14" height="12" border="0" alt="" /></td>
                                                                                                        <td class="text-top" style="color:#999999; font-family:"Lato", Arial, sans-serif; font-size:14px; line-height:18px; text-align:left; min-width:auto !important;"><a href="http://rhema-divine.com" target="_blank" class="link-grey" style="color:#999999; text-decoration:none;"><span class="link-grey" style="color:#999999; text-decoration:none;">Voir le site</span></a></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </th>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Header -->
                                                            
                                                            <!-- Title + Copy - center -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#62b3ff">
                                                                <tr>
                                                                    <td class="p30-20" style="padding: 80px 50px;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="h1 white center" style="padding-bottom: 20px; font-family:"Lato", Arial, sans-serif; font-size:44px; line-height:50px; color:#ffffff; text-align:center;">Votre Code Unique de Confirmation  <br> '.$token.'</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text white center" style="padding-bottom: 25px; font-family:"Lato", Arial, sans-serif; font-size:16px; line-height:28px; min-width:auto !important; color:#ffffff; text-align:center;">Copier le code ci-haut puis cliquer sur le bouton ci-dessous afin de se rediriger dans la page correspondante pour confirmer votre compte RD.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td class="text-button" style="color:#ffffff; font-family:"Lato", Arial, sans-serif; font-size:16px; line-height:20px; text-align:center; text-transform:uppercase; font-weight:bold; min-width:auto !important; padding:12px 22px; background:#0a2641; border-radius:4px;"><a href="http://rhema-divine.com/index.php?page=confirm" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;"><span class="link-white" style="color:#ffffff; text-decoration:none;">CONFIRMER  ICI</span></a></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Title + Copy - center -->
                                                        
                                                            
                                                            <!-- Article -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#00122c">
                                                                <tr>
                                                                    <td style="padding: 50px;" class="p30-20">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="h2 white center" style="padding-bottom: 25px; font-family:"Lato", Arial, sans-serif; font-size:24px; line-height:30px; text-transform:uppercase; color:#ffffff; text-align:center;">RHEMA DIVINE</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text2 grey center" style="font-family:"Lato", Arial, sans-serif; font-size:15px; line-height:28px; min-width:auto !important; color:#848b95; text-align:center;">Le site rhema divine est le portail d\'édification qui vous permet de vous rapprocher du seigneur afin de vitaliser votre foi chrétienne au travers de l\'adoration et des prédications très édifiantes et tout cela à zero prix.</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fluid-img" style="padding-bottom: 25px; font-size:0pt; line-height:0pt; text-align:left;"><img src="images/rhemaEntete.png" width="650" height="345" border="0" alt="" /></td>
                                                                </tr>
                                                                
                                                            </table>
                                                            <!-- END Article -->
                                                        
                                                            <!-- CTA -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="padding: 50px;" class="p30-20" bgcolor="#62b3ff">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                                            <tr>
                                                                                <td class="h2 white center" style="padding-bottom: 20px; font-family:"Lato", Arial, sans-serif; font-size:24px; line-height:30px; text-transform:uppercase; color:#ffffff; text-align:center;">Vous pouvez nous Contacter</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text white center" style="padding-bottom: 30px; font-family:"Lato", Arial, sans-serif; font-size:16px; line-height:28px; min-width:auto !important; color:#ffffff; text-align:center;">Vous avez une question ou une suggestion, un formulaire est mis à votre disposition.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <!-- Button -->
                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td class="text-button" style="color:#ffffff; font-family:"Lato", Arial, sans-serif; font-size:16px; line-height:20px; text-align:center; text-transform:uppercase; font-weight:bold; min-width:auto !important; padding:12px 22px; background:#0a2641; border-radius:4px;"><a href="#" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;"><span class="link-white" style="color:#ffffff; text-decoration:none;">NOUS CONTACTER</span></a></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    <!-- END Button -->
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END CTA -->
                    
                                                            <!-- Footer -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#00122c">
                                                                <tr>
                                                                    <td style="padding: 50px;" class="p30-20">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td style="padding-bottom: 30px;">
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <th class="column" width="170" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/rd.png" width="40" height="30" border="0" alt="" /></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </th>
                                                                                            <th style="padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
                                                                                            <th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td align="right">
                                                                                                            <table class="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                                                                                                                <tr>
                                                                                                                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/ico_facebook.jpg" width="33" height="33" border="0" alt="" /></td>
                                                                                                                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/ico_twitter.jpg" width="33" height="33" border="0" alt="" /></td>
                                                                                                                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/ico_instagram.jpg" width="33" height="33" border="0" alt="" /></td>
                                                                                                                    <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="images/ico_linkedin.jpg" width="33" height="33" border="0" alt="" /></td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <th class="column-top" width="370" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td class="text-footer m-center" style="color:#666666; font-family:"Lato", Arial, sans-serif; font-size:12px; line-height:26px; text-align:left; min-width:auto !important;">Le site de révélation  - Rhema divine <br />Metz 57000 / France</td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </th>
                                                                                            <th style="padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
                                                                                            <th class="column-bottom" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:bottom;">
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td class="text-footer right m-center" style="color:#666666; font-family:"Lato", Arial, sans-serif; font-size:12px; line-height:26px; min-width:auto !important; text-align:right;"><a href="http://softhandy.fr" target="_blank" class="link-grey-u" style="color:#999999; text-decoration:underline;"><span class="link-grey-u" style="color:#999999; text-decoration:underline;">dévelloppé par Softhandy</span></a></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Footer -->
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- END Main -->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                    </html>';
                    $header = "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html; charset-utf-8\r\n";
                    $header .= 'From: no-reply@rhema-divine.com' . "\r\n" . 'Reply-To: contact@rhema-divine.com'  ."\r\n"; 

                    mail($email, $subject,$message,$header);
                       ?>
                       <script>window.document.location="index.php?page=confirm";</script>";
                       <?php
                   }
               }
            }
            ?>
    <div class="row ">
        <div class="col-md-8  offset-2">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images/tchat/welcome.png" width="300px" height="700px" alt="inscription sur rhema-divine">
                    </div>
                    <div class="col-md-8 bg-dark">
                        <form action="" method="POST" class="form-group  p-5  text-light">
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" class="form-check-input" checked id="materialInline1" value="homme">
                                <label class="form-check-label" for="materialInline1">Homme</label>
                            </div>

                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" name="sexe" class="form-check-input" id="materialInline2" value="femme">
                                <label class="form-check-label" for="materialInline2">Femme</label>
                            </div>
                            <h5 class="mt-2">Profil</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  class="form-control mt-2" name="prenom" placeholder="prénom">
                                </div>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control mt-2" name="nom" placeholder="nom">
                                </div>
                            </div>
                            <input type="text"  class="form-control mt-2" name="pseudo" placeholder="pseudo">
                            <input type="email"  class="form-control mt-2" name="email" placeholder="e-mail">
                            <div class="form-group">
                                <label for="date"><h5 class="mt-2">Date de naissance</h5></label><br>
                                <input id="date" type="date"  class="form-control " name="naissance" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="select"><h5 class="mt-2">Appartenance réligieuse</h5></label><br>
                                <select class="form-control" name="religion" id="select">
                                    <option value="">Choisir...</option>
                                    <option value="evangelique">Evangélique</option>
                                    <option value="protestant">Protestant</option>
                                    <option value="catholique">Catholique</option>
                                    <option value="musulman">Musulman</option>
                                </select>
                            </div>
                            <small class="text-danger">En cliquant sur Inscription, vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.</small>
                            <div class="row">
                                <div class="col-md-4">
                                    <button  type="submit" name="submit" class="btn btn-primary mt-2 btn-block ">Inscription</button>
                                </div> 
                            </div>
                            
                        </form><br><br>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class=" col-md-5 mt-5 ">
           <div class="justify-content-center align-items-center ml-5">
                <img src="images/pasteur.png" width="400px" alt="">
           </div>
        </div> -->
    </div>
</div>

