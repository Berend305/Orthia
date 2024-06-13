<?php include 'includes/header.php'; ?>
<?php require 'config/db.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tickets WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$ticket = $stmt->fetch();

if (!$ticket) {
    echo "Ticket niet gevonden.";
    include 'includes/footer.php';
    exit();
}

if ($_SESSION['role'] != 'admin' && $_SESSION['user_id'] != $ticket['user_id']) {
    echo "U heeft geen toestemming om dit ticket te bewerken.";
    include 'includes/footer.php';
    exit();
}
?>

<h2>Ticket Bewerken</h2>
<form action="actions/update_ticket.php" method="POST">
    <input type="hidden" name="id" value="<?= $ticket['id'] ?>">
    <label for="title">Titel:</label>
    <input type="text" name="title" value="<?= $ticket['title'] ?>" required>
    <label for="description">Beschrijving:</label>
    <textarea name="description" required><?= $ticket['description'] ?></textarea>
    <label for="status">Status:</label>
    <select name="status">
        <option value="Open" <?= $ticket['status'] == 'open' ? 'selected' : '' ?>>Open</option>
        <option value="Bezig" <?= $ticket['status'] == 'bezig' ? 'selected' : '' ?>>Bezig</option>
        <option value="Opgelost" <?= $ticket['status'] == 'opgelost' ? 'selected' : '' ?>>Opgelost</option>
    </select>
    <button type="submit">Update</button>
</form>

<?php include 'includes/footer.php'; ?>
