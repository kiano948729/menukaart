<?php
session_start();
require_once 'databaseConnect.php'; // Zorg dat het pad klopt!
global $conn;

// Check of gebruiker admin is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Toegang geweigerd! Alleen admins mogen items verwijderen.");
}

// Check of het een POST-verzoek is met een item ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item_id'])) {
    $itemId = $_POST['delete_item_id'];

    try {
        $query = "DELETE FROM items WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect terug naar beheerpagina (voorkom opnieuw POST)
        header("Location: addItem.php");
        exit;

    } catch (PDOException $e) {
        echo "Fout bij verwijderen item: " . $e->getMessage();
    }
} else {
    echo "Ongeldig verzoek.";
}
?>
