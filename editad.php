<?php 
    require('config/config.php');
    require('config/db.php');
    
    if (isset($_POST['submit'])) {
        /*$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $rubriek = mysqli_real_escape_string($conn, $_POST['rubriek']);
        $naam = mysqli_real_escape_string($conn, $_POST['naam']);
        $omschrijving = mysqli_real_escape_string($conn, $_POST['omschrijving']);*/
        $update_id = mysqli_real_escape_string($conn, isset($_POST['update_id']) ? $_POST['update_id'] : 0);
        $id = mysqli_real_escape_string($conn, isset($_POST['id']) ? $_POST['id'] : 0);
        $rubriek = mysqli_real_escape_string($conn, isset($_POST['rubriek']) ? $_POST['rubriek'] : '');
        $naam = mysqli_real_escape_string($conn, isset($_POST['naam']) ? $_POST['naam'] : '');
        $omschrijving = mysqli_real_escape_string($conn, isset($_POST['omschrijving']) ? $_POST['omschrijving'] : '');
        
        $query = "UPDATE advertenties SET
                    rubriek = '$rubriek', naam = '$naam', omschrijving = '$omschrijving'
                        WHERE id = {$update_id}";
                        die($query);
        if (mysqli_query($conn, $query)) {
            header('Location:' . ROOT_URL . '');
            
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
    }
    
}
$id = mysqli_real_escape_string($conn, isset($_GET['id']));

$query = "SELECT * FROM `advertenties` WHERE `id`='.$id'" ;

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
    <title>Wijzig je advertentie</title>
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
    <div style="margin-top: 7%;" class="flex-container">
        <main class="box">
            <h2>Advertentie wijzigen</h2>
            <p><span class="error">* verplicht</span></p>
            <form method="POST" onsubmit="window.alert('Je advertentie is gewijzigd!', true)" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                <h4>Rubriek</h4>
                <input type="text" name="rubriek" value="<?php echo $post['rubriek'] ;?>"><br>
                <h4>Naam product</h4>
                <input type="text" value="<?php echo $post['naam']; ?>" name="naam" required><br>
                <h4>Omschrijving</h4>
                <textarea name="omschrijving" type="text" rows="5" cols="25" value="<?php echo $post['omschrijving']; ?>" required></textarea><br>
                <!--<input id="button" type="submit" value="Upload foto's">-->
                <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>"> 
                <input name="submit" id="button" type="submit" value="Verzenden">

            </form>
        </main>
    </div>
    
    <script></script>
</body>

</html>