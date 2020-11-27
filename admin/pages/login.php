<?php
//session_start();
//verifier si la session est ouverte, aller directement sur dashboard
if(isset($_SESSION['admin'])){
    header("Location:index.php?page=dashboard");
}
?>
<div class="text-center">
    <img src="../images/user-female.png" width="120px" class="mt-3 rounded-circle" alt="utilisateur">
</div>
<h4 class="text-center mt-2">Se connecter</h4>

<?php
if(isset($_POST['submit'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    //$errors = [];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        //$errors['email'] = "L'adresse mail est invalide. Vérifier svp";
        $_SESSION['alert'] = "L'adresse mail est invalide. Vérifier svp";
        $_SESSION['alert_code'] = "error";
    }
    elseif(empty($email) || empty($password)){
        //$errors['empty'] = "Renseigner les bonnes valeurs pour vous connectés; Merci";
        $_SESSION['alert'] = "Renseigner les bonnes valeurs pour vous connectés; Merci";
        $_SESSION['alert_code'] = "error";

    }else if(is_admin($email,$password) == 0){
        //$errors['exist'] = "Cet administrateur n'existe pas. Merci";
        $_SESSION['alert'] = "Cet administrateur n'existe pas. Merci";
        $_SESSION['alert_code'] = "error";
    }

    
/*     if(!empty($errors)){
        //$_SESSION['admin'] = $_POST['email'];
    ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 alert alert-danger">
            <?php foreach($errors as $error){
                echo $error .'<br>';
            } ?>
        </div>
    </div>
    <?php } */
    else{
        $resl = is_log($email, $password);
        foreach($resl as $rep){
            $_SESSION['admin'] = $rep->email;
            $_SESSION['name_admin'] = $rep->name;

        }
        header("Location:index.php?page=dashboard");
        ?>
    <?php
     } 
    
}
?>

<div class="row"> 
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fas fa-magic"></i> Se connecter</button><hr>
        <div class="text-center"><a href="index.php?page=new">Nouveau Modérateur</a></div>
        </form>

        <!--<h2>Debug</h2> -->
        <?php //var_dump($_SESSION)?>
    </div>
    <div class="col-md-3"></div>
</div>


