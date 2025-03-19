<?php
session_start();

// Gastgebruiker instellen
$_SESSION['user_id'] = null; // Geen echte gebruiker
$_SESSION['guest'] = true;

header("Location: ../menu.php");
?>