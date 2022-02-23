<?php

require_once 'db.php';

$db = dbConnect();

$id = (int)$_GET['id'];

$query = $db->prepare("DELETE FROM tasks WHERE id=:id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

header('Location: ../todo.php');
exit();