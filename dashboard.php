<?php include 'includes/header.php'; ?>

<div class="dashboard-container">
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <h1>Dashboard:</h1>
    <?php else: ?>
        <h1>Hulpmiddelen:</h1>
    <?php endif; ?>
    <div class="links-container">
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <a href="admin_tickets.php">
            <div class="link-box blue">
                <img src="images/support-ticket.png" alt="Tickets beheren">
                <p>Tickets beheren</p>
            </div>
            </a>
        <?php else: ?>
            <a href="tickets.php">
            <div class="link-box yellow">
                <img src="images/customer-service.png" alt="Ticket aanmaken">
                <p>Ticket aanmaken</p>
            </div>
            </a>    
            <a href="manuals.php">  
            <div class="link-box blue"> 
                <img src="images/folders.png" alt="Handleidingen">
                <p>Handleidingen & <br> Overheenkomsten</p>
            </div>
            </a>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
