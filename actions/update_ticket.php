<?php
require '../config/db.php';
session_start();

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];

$sql = "UPDATE tickets SET title = ?, description = ?, status = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $description, $status, $id]);

header('Location: ../admin_tickets.php');
?>
