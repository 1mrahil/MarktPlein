<?php 
    require('config/config.php');
    require('config/db.php');
    $naamErr = $omschrijvingErr = "";
    $naam = $omschrijving = "";
    
    if (isset($_POST['submit'])) {
        $rubriek = mysqli_real_escape_string($conn, $_POST['rubriek']);
        $naam = mysqli_real_escape_string($conn, $_POST['naam']);
        $omschrijving = mysqli_real_escape_string($conn, $_POST['omschrijving']);

        $query = "INSERT INTO advertentie (rubriek, naam, omschrijving) VALUES ('$rubriek', '$naam', '$omschrijving')";
        if (mysqli_query($conn, $query)) {
            header('Location:' . ROOT_URL . 'verzonden.php');
            
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
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
    <div style="margin-top: 7%;" class="flex-container">
        <main class="box">
        <h3 style="color:green;">Je advertentie is geplaatst!</h3>
            <h1>Advertentie plaatsen</h1>
            <h3>Wat wil je verkopen?</h3>
            <h4>Vul rubriek in</h4>
            <p><span class="error">* verplicht</span></p>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="rubriek" placeholder="Rubriek">
                <input id="button" type="submit" value="Vind rubriek"><br>
                <select name="rubriek" required>
                    <option value="auto's">Auto's</option>
                    <option value="boeken">Boeken</option>
                    <option value="computers & software">Computers & software</option>
                    <option value="diversen">Diversen</option>
                    <option value="dieren & toebehoren">Dieren & toebehoren</option>
                    <option value="fietsen & brommers">Fietsen & brommers</option>
                    <option value="hobby & vrije tijd">Hobby & vrije tijd</option>
                    <option value="kleding">Kleding</option>
                    <option value="muziek & instrumenten">Muziek & instrumenten</option>
                    <option value="sport & fitness">Sport & fitness</option>
                    <option value="sport & fitness">Tuin & terras</option>
                    <option value="vakantie">Vakantie</option>
                    <option value="witgoed & apparatuur">Witgoed & apparatuur</option>
                    <option value="zakelijke goederen">Zakelijke goederen</option>
                    <!--<input style="margin-left: 5px;" id="button" type="submit" value="Verder"> -->
                </select><br>
                <h3>Naam product</h3>
                <input type="text" name="naam" placeholder="Naam product" value="" required>
                <h4>Omschrijving</h4>
                <textarea name="omschrijving" type="text" placeholder="Omschrijving" rows="5" cols="25" required value="<?php echo $omschrijving; ?>"></textarea><br>
                <!--<input id="button" type="submit" value="Upload foto's">--><br>
                <input name="submit" id="button" type="submit" value="Verzenden">


            </form>
        </main>
    </div>
    <script></script>
</body>

</html>
