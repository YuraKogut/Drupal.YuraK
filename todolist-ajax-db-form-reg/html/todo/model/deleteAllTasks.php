<?php

require_once 'db.php';

session_start();

$db = dbConnect();

$id = (int)$_SESSION['id'];

$sql = "DELETE FROM tasks WHERE id_user=:id";
$query = $db->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
header("Location: ../todo.php");
exit();