
<?php

echo "rubriek " .$_POST ["rubriek"]. " "."naam " .$_POST["naam"]." "."omschrijving ".$_POST["omschrijving"]
/*
if(isset($_POST['verzenden'])){

    if($_POST['rubriek'] == ""){
        $error="Rubriek verplicht!<br>"; 
    }

    if($_POST['naam'] == ""){
        $error="Naam verplicht!<br>"; 
    }

    if($_POST['omschrijving'] == ""){
        $error="Omschrijving verplicht!<br>"; 
    }

    if(isset($error)){
        echo $error;
    }else{
        // Both fields have content in

    }

}

?>

  $naamErr = $rubriekErr = $omschrijvingErr="";
$naam = $rubriek = $omschrijving= ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["naam"])) {
      $nameErr = "Naam verplicht!";
    } else {
      $name = test_input($_POST["naam"]);
    
    }
    
    if (empty($_POST["rubriek"])) {
      $emailErr = "Rubriek verplicht!";
    } else {
      $email = test_input($_POST["rubriek"]);
    }
  
    if (empty($_POST["omschrijving"])) {
      $omschrijvingErr = "Omschrijving verplicht!";
    } else {
      $omschrijving = test_input($_POST["omschrijving"]);
    }
  
  }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
*/
?>
