<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="nav-links">
    <a href="../index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>"><img href="../img/logo.png">The Grounds</a>
    <a href="#" class=""><img href="../img/image.png"></a>
    <a href="#" class="">#</a>
    <a href="#" class="">#</a>
    <a href="../menu.php" class="<?php echo $current_page == 'menu.php' ? 'active' : ''; ?>">Menu</a>
    <a href="../contact.php" class="<?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">Contact Us</a>
</nav>