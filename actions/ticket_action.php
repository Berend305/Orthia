<?php
require '../config/db.php';
session_start();

$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tickets (user_id, title, description) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $title, $description]);

header('Location: ../tickets.php');
?>
