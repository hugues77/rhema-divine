<div class="bg-inscription p-5">
<?php
if(isset($_POST['submit'])){
    $email = htmlspecialchars(trim($_POST['pseudo']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $code = htmlspecialchars(trim($_POST['code']));
    $errors = [];
    if(empty($email) || empty($code)){
        $errors['empty'] = "Tous champs doivent etre remplis. Merci";
    }
    if(!verif($pseudo,$code,$email)){
        $errors['verif'] = "Les informations ne sont pas exactes, vérifier";
    }

    if(!empty($errors)){
        foreach($errors as $error){
            ?>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="alert alert-danger"><?=$error?></div>
                </div>
            </div>
        <?php
        }
    }else{
        //mise à jour de token par zero
        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $pseudo;
        token_zero($email,$pseudo);
        //header("Location:index.php?page=password");
        ?>
        <script>window.document.location="index.php?page=password";</script>";
        <?php
    }
}
?>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="" method="POST" class="form-group bg-dark p-5 mt-5 rounded text-light">
            <div class="alert alert-danger">Un email vient de vous etre envoyé par mail, consulter puis valider votre compte</div>          
                <h3 class="mt-2 mb-2">Confirmer votre email</h3>
                            
                    <div class="mt-2">
                        <input type="text"  class="form-control mt-2" name="pseudo" placeholder="email ou pseudo">
                    </div>
                    <div class="">
                        <input type="password"  class="form-control mt-2" name="code" placeholder="Code unique">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-primary mt-2 btn-block ">Valider compte</button>
                        </div> 
                    </div>
            </form>
        </div>
    </div>
</div>
