<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['delete'])) {
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

  $query = "DELETE FROM Advertentie WHERE id = {$delete_id}";

  if (mysqli_query($conn, $query)) {
    header('Location:' . ROOT_URL . '');
    
  } else {
    echo 'ERROR: ' . mysqli_error($conn);
  }
}

$id = mysqli_real_escape_string($conn, $_GET['ID']);



$query = 'SELECT * FROM advertentie';

$result = mysqli_query($conn, $query);

$advertenties = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

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
    <title>Plaats je advertentie</title>
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
    <h1 style="text-align: center; margin-top: 5%;">Jouw advertenties</h1>
    <?php foreach ($advertenties as $advertentie) : ?>
    <div class="flex-container">
      <div class="box">
        <h4><?php echo $advertentie['Rubriek']; ?></h4>
        <h5><?php echo $advertentie['Naam']; ?></h5>
        <p><?php echo $advertentie['Omschrijving']; ?></p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="delete">
          <input type="hidden" name="delete_id" value="<?php echo $advertentie['ID'] ?>">
          <input type="submit" name="delete" value="Verwijderen">
      </form>
      </div>
    </div>
    <?php endforeach; ?>
    
      
    
   

    
  
  </body>
</html>


