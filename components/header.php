<?php
global $current_user;
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <div class="index-nav">
        <div>
            <a href="../index.php">Menukaart</a>
        </div>
        <div>
            <a href="../index.php">Home</a>
            <a href="../menu.php">Menu</a>
            <a href="../about.php">About us</a>
            <a href="../contact.php">Contact</a>

        </div>
        <div>
            <?php if ($current_user): ?>
                <span>Welkom, <?php echo htmlspecialchars($current_user); ?></span>
                <a href="../backend/logout.php">Uitloggen</a>
            <?php else: ?>
                <a href="../backend/login.php">Inloggen</a>
                <a href="../backend/register.php">Registreren</a>
                <a href="../backend/guest.php">Gast</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
