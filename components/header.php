<?php
global $current_user;
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <a href="../index.php">Home</a>
    <?php if ($current_user): ?>
        <span>Welkom, <?php echo htmlspecialchars($current_user); ?></span>
        <a href="../backend/logout.php">Uitloggen</a>
    <?php else: ?>
        <a href="../backend/login.php">Inloggen</a>
        <a href="../backend/register.php">Registreren</a>
        <a href="../backend/guest.php">Ga verder als gast</a>
    <?php endif; ?>
</nav>
