<?php include 'includes/header.php'; ?>
<?php require 'config/db.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT tickets.id, tickets.title, tickets.description, tickets.status, tickets.created_at, users.username 
        FROM tickets 
        JOIN users ON tickets.user_id = users.id 
        WHERE tickets.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$ticket = $stmt->fetch();
if (!$ticket) {
    echo "Ticket niet gevonden.";
    include 'includes/footer.php';
    exit();
}
?>

<div class="ticket-details-container">
    <h1 class="ticket-details-h1">Ticket Details</h1>
    <p><strong>ID:</strong> <?= $ticket['id'] ?></p>
    <p><strong>Gebruiker:</strong> <?= $ticket['username'] ?></p>
    <p><strong>Titel:</strong> <?= $ticket['title'] ?></p>
    <p><strong>Beschrijving:</strong> <?= $ticket['description'] ?></p>
    <p><strong>Status:</strong> <span class="status <?= $ticket['status'] ?>"><?= ucfirst($ticket['status']) ?></span></p>
    <p><strong>Aangemaakt op:</strong> <?= $ticket['created_at'] ?></p>
    <?php if ($_SESSION['role'] == 'admin'): ?>
    <a href="admin_tickets.php" class="btn btn-back">Terug naar tickets</a>
    <?php else: ?>
    <a href="tickets.php" class="btn btn-back">Terug naar mijn tickets</a>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
