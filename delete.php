<?php 
require_once "conexion.php";
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$sql ="DELETE FROM monsters WHERE id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: index.php");
?>