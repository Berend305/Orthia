<?php include 'includes/header.php'; ?>
<?php require 'config/db.php'; ?>

<div class="tickets-container">
    <h1>Mijn Tickets</h1>
    <p>Technische problemen? maak een ticket aan en onze beheerders zullen z.s.m te hulp schieten.</p>
    <a href="create_ticket.php" class="new-ticket-btn">Nieuw Ticket</a>

    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM tickets WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    $tickets = $stmt->fetchAll();
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Status</th>
            <th>Actie</th>
        </tr>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= htmlspecialchars($ticket['id']) ?></td>
                <td><?= htmlspecialchars($ticket['title']) ?></td>
                <td><?= htmlspecialchars($ticket['status']) ?></td>
                <td class="action-buttons">
                    <a href="view_ticket.php?id=<?= $ticket['id'] ?>" class="view">Bekijk</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
