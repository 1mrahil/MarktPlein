<?php
require('config/config.php');
require('config/db.php');

if (isset($_POST['delete'])) {
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

  $query = "DELETE FROM Advertenties WHERE id = {$delete_id}";

  if (mysqli_query($conn, $query)) {
    header('Location:' . ROOT_URL . 'advertentie.php');

  } else {
    echo 'ERROR: ' . mysqli_error($conn);
  }
}


$id = mysqli_real_escape_string($conn, isset($_GET['id']));


$query = 'SELECT * FROM advertenties';

$result = mysqli_query($conn, $query);

$post = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <title>Mijn advertenties</title>
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
    <h1 style="text-align: center; margin-top: 5%;">Mijn advertenties</h1>
    <?php foreach ($post as $advertenties) : ?>
    <div class="flex-container">
      <div class="box">
        <h4><?php echo $advertenties['rubriek']; ?></h4>
        <h5><?php echo $advertenties['naam']; ?></h5>
        <p><?php echo $advertenties['omschrijving']; ?></p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="delete">
          <a id="button" href="<?php echo ROOT_URL; ?>editad.php?id=<?php echo $post['id']; ?>">Wijzigen</a>
          <input type="hidden" name="delete_id" value="<?php echo $advertenties['id'] ?>">
          <input id="button" type="submit" name="delete" value="Verwijderen">
      </form>
      </div>
    </div>
    <?php endforeach; ?>
    
      
    
   

    
  
  </body>
</html>


