<?php
require '../config/db.php';
session_start();

$id = $_GET['id'];

if ($_SESSION['role'] != 'admin') {
    echo "U heeft geen toestemming om dit ticket te verwijderen.";
    exit();
}

$sql = "DELETE FROM tickets WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: ../admin_tickets.php');
?>
