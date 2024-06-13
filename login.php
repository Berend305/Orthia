<?php include 'includes/header.php'; ?>

<div class="auth-container">
    <h2>Login</h2>
    <form action="actions/login_action.php" method="POST">
        <label for="username">Naam:</label>
        <input type="text" name="username" required>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

