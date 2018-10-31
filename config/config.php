<?php 
define ('ROOT_URL', 'http://localhost/php/marktplaats/');
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'MarktPlein');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>