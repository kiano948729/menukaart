<?php
global $conn;
session_start();
require_once 'conn.php';

// Verkrijg input
$username = $_POST['username'];
$password = $_POST['password'];

// Zoek gebruiker in database
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([':username' => $username]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user['password'])) {
    die("Ongeldige gebruikersnaam of wachtwoord!");
}

// Sla gebruikers-ID op in de sessie
$_SESSION['user_id'] = $user['id'];

header("Location: ../menu.php");
?>