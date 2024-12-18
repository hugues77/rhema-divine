<?php
if(isset($_SESSION['admin'])){
    header("Location:index.php?page=dashboard");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 card mt-2 mb-2">
            <div class="mt-2 text-center">
                <img src="../images/user-female.png" alt="Modérateur" class="text-center" width="160px">
            </div>
            <h4 class="text-center mt-2">Se connecter</h4>

            <?php
                if(!empty($_GET['token']) && !empty($_GET['email'])){
                    $token = $_GET['token'];
                    $email = $_GET['email'];
                    /**
                     * l'adresse email et le token va etre recuperer dans le GET
                     * si c'est bon il vous redirige vers password
                     * si c'est pas le cas il affiche erreur tout en vous redirigeant vers login
                     */
                    //$email = htmlspecialchars(trim($_POST['mail']));
                    //$token = htmlspecialchars(trim($_POST['pswd']));
                    //$errors = [];
                    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
                    $a = [
                        'email'   => $email,
                        'token'   => $token
                    ];
                    $sql = "SELECT * FROM admins WHERE  email=:email AND token=:token";
                    $req= $connexion->prepare($sql);
                    $req->execute($a);
                    $result = $req->rowCount($sql);

                    
                    if(!$result){
                       // $errors['exist'] = "Ce Modérateur n'existe pas";
                       $_SESSION['alert'] = "Ce Modérateur n'existe pas";
                       $_SESSION['alert_code'] = "error";
                       header("Location:index.php?page=login");
                       exit();
                    }
 
/*                     if(!empty($errors)){
                        foreach($errors as $error){
                            ?>
                            <div class="alert alert-danger"><?=$error?></div>
                            <?php
                        }
                    } */
                    else{
                        $_SESSION['admin'] = $email;
                        $z = [
                            'email'   => $email,
                            'token'   => ""
                        ];
                        $sq = "UPDATE admins set token=:token WHERE email=:email";
                        $rt = $connexion->prepare($sq);
                        $rt->execute($z);
                        //die("zoba");
                        header("Location:index.php?page=password");
                    }
                }else{
                    //$errors['empty'] = "Tous les champs doivent etre remplis";
                    $_SESSION['alert'] = "Le Token et/ou l'email ne corresponds pas, Désolé";
                    $_SESSION['alert_code'] = "error";
                    header("Location:index.php?page=login");
                    exit(); 
                    
                }

            ?>
            <form action="" method="POST" class="form-group">
                <input type="email"  class="form-control" name="mail" placeholder="votre e-mail">
                <input type="password"  class="form-control mt-2" name="pswd" placeholder="votre code unique">
                <center>
                    <button type="submit" name="submit" class="btn btn-primary mt-2 btn-sm">connexion</button><br>
                    <a href="?page=login">Déjà Modérateur</a>
               </center>
            </form>
        </div> 
        <div class="col-md-3"></div>  
    </div>
</div>