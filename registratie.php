<?php
//verbinding met db
require('config/config.php');
require('config/db.php');
//gegevens invoeren
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['e-mail']);
    $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
    
    $query = "INSERT INTO gebruikers (e_mail, wachtwoord) VALUES ('$email', '$wachtwoord')";
    if (mysqli_query($conn, $query)) {
        header('Location:' . ROOT_URL . 'registratie.php');
        
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
}

}
mysqli_close($conn);
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
    <title>Registratie</title>
</head>
<body>
<div>
    <nav class="navbar">
        <a href="#">MarktPlein</a>
        <a href="#">Help</a>
        <a class="icons" href="#"><i class="fas fa-comments"></i></a>
        <a class="icons" href="#"><i class="far fa-bell"></i></a>
        <a class="icons" href="registratie.php"><i class="far fa-user"></i></a>
    </nav>
</div>
<div class="login">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label>E-mailadres</label><br>
    <input type="email" name="e-mail" id="fields" required><br>
    <label>Wachtwoord</label><br>
    <input type="password" name="wachtwoord" id="fields" required><br>
    <label>Herhaal wachtwoord</label><br>
    <input type="password" name="" id="fields" required><br>
    <input name="submit" type="submit" value="Maak account aan">
    <input type="submit" value="Annuleren">
</div>

</form>
    
</body>
</html>