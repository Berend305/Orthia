<?php include 'includes/header.php'; ?>
<?php require 'config/db.php'; ?>

<div class="tickets-container">
    <h1 class="tickets-title">Beheer Tickets</h1>

<?php
$sql = "SELECT tickets.id, tickets.title, tickets.status, tickets.user_id, users.username 
        FROM tickets 
        JOIN users ON tickets.user_id = users.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tickets = $stmt->fetchAll();
?>

    <table>
        <tr>
            <th>ID</th>
            <th>Gebruiker</th> <!-- Aangepast van "Gebruiker ID" naar "Gebruiker" -->
            <th>Titel</th>
            <th>Status</th>
            <th>Actie</th>
        </tr>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= $ticket['id'] ?></td>
                <td><?= $ticket['username'] ?></td> <!-- Toon gebruikersnaam in plaats van gebruikers-ID -->
                <td><?= $ticket['title'] ?></td>
                <td><?= $ticket['status'] ?></td>
                <td class="action-buttons">
                    <a href="view_ticket.php?id=<?= $ticket['id'] ?>" class="view">Bekijk</a>
                    <a href="edit_ticket.php?id=<?= $ticket['id'] ?>" class="edit">Wijzig</a>
                    <a href="actions/delete_ticket.php?id=<?= $ticket['id'] ?>" class="delete">Verwijder</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
