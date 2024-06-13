<?php include 'includes/header.php'; ?>
<?php if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
} ?>

<div class="create-ticket-container">
    <h2>Nieuwe Ticket</h2>
    <form action="actions/ticket_action.php" method="POST">
        <label for="title">Titel:</label>
        <input type="text" name="title" required>
        <label for="description">Beschrijving:</label>
        <textarea name="description" required></textarea>
        <button type="submit">Verzend</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
