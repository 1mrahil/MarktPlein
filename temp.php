<?php 
$id = mysqli_real_escape_string($conn, isset($_GET['id']));
$query_string= "SELECT * FROM advertenties WHERE id=" .$id;

$query = mysqli_query($conn, "SELECT * FROM advertenties WHERE id=" .$id) or die(mysqli_error());

$result = mysqli_query($conn, $query);

$post = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
?>