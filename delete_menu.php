<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM menu WHERE id='$id'");
header("Location: admin.php");
?>