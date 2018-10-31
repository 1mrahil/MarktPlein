<?php 
session_start();
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
    <title>Inloggen succesvol</title>
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
<?php 
echo '<br><h3>Inloggen succesvol, welkom '.$_SESSION["email"].'</h3>';
?>
    
</body>
</html>