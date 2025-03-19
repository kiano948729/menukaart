<?php
global $conn;
require_once 'conn.php';

// Verkrijg input
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Controleer of gebruikersnaam al bestaat
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([':username' => $username]);

if ($statement->rowCount() > 0) {
    die("Gebruikersnaam bestaat al!");
}

// Voeg gebruiker toe aan database
$query = "INSERT INTO users (username, password) VALUES (:username, :password)";
$statement = $conn->prepare($query);
$statement->execute([':username' => $username, ':password' => $password]);

header("Location: ../menu.php");
exit;
?>