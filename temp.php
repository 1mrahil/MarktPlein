$rubriek = mysqli_real_escape_string($conn, $_POST['rubriek']);
    $naam = mysqli_real_escape_string($conn, $_POST['naam']);
    $omschrijving = mysqli_real_escape_string($conn, $_POST['omschrijving']);

    $query = "INSERT INTO advertentie (rubriek, naam, omschrijving) VALUES ('$rubriek', '$naam', '$omschrijving')";