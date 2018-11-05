<?php

//maak verbinding met db
require('config/config.php');
require('config/db.php');
session_start();

$data = new databases;
$message = '';
if(isset($_POST["login"])){
    
    $field = array(
        'email' => $_POST["email"],
        'wachtwoord' => $_POST["wachtwoord"] 
    );



    if ($data->required_validation($field)) {

        if ($data->can_login("gebruikers", $field)) {
            $_SESSION["email"] = $_POST["email"];
            header("location: login_success.php");
        } else {
            $message = $data->error;
        }

    }

}    
 



?>

    
   


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div>
    <nav class="navbar">
        <a href="#">MarktPlein</a>
        <a href="#">Help</a>
        <a class="icons" href="#"><i class="fas fa-comments"></i></a>
        <a class="icons" href="#"><i class="far fa-bell"></i></a>
        <a class="icons" href="#"><i class="far fa-user"></i></a>
    </nav>
</div>
<div class="login">
    <?php 
    if(isset($message)){
        echo '<label>'.$message.'</label>';
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h3>Inloggen</h3>
    <p><a href="registratie.php">Registreren</a> <a href="login.php">Inloggen</a></p>
    <label>E-mailadres</label><br>
    <input type="email" name="email" id="" required><br>
    <label>Wachtwoord</label><br>
    <input type="password" name="wachtwoord" id="" autocomplete="off" required><br>
    <input name="login" type="submit" value="Inloggen">
    <input name="annuleren" type="submit" value="Annuleren">
    </div>

</form>
    
<div>
    
</div>

    
</form>
    
</body>
</html>
