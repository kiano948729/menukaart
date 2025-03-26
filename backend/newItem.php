<?php
session_start();
require_once 'databaseConnect.php';
global $conn;

// Controleer of de gebruiker ingelogd is en admin is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Toegang geweigerd! Alleen admins mogen items toevoegen.");
}

// Initialiseer fout- en succesmeldingen
$error = null;
$success = null;

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? null;
    $stock = $_POST['stock'] ?? null;

    // Validatie: controleer of alle velden correct zijn ingevuld
    if (empty($category_id) || empty($name) || empty($price) || !is_numeric($price) || !is_numeric($stock)) {
        $error = "Vul alle velden correct in. Prijs en voorraad moeten numeriek zijn.";
    } else {
        // Voeg het item toe aan de database
        try {
            $query = "INSERT INTO items (category_id, name, price, stock) VALUES (:category_id, :name, :price, :stock)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':category_id' => $category_id,
                ':name' => $name,
                ':price' => $price,
                ':stock' => $stock
            ]);
            $success = "Het item is succesvol toegevoegd!";
        } catch (PDOException $e) {
            $error = "Er is een fout opgetreden bij het toevoegen van het item. Probeer het alstublieft opnieuw.";
        }
    }
}

// Haal categorieën op voor de dropdown
try {
    $query = "SELECT id, name FROM categories";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Er is een fout opgetreden bij het ophalen van de categorieën.");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Item Toevoegen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h1>Nieuw Item Toevoegen</h1>

    <!-- Toon foutmelding -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- Toon succesmelding -->
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <!-- Formulier -->
    <form action="newItem.php" method="POST">
        <label for="category_id">Categorie</label>
        <select name="category_id" id="category_id" required>
            <option value="">Selecteer een categorie</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" placeholder="Naam van het item" required>

        <label for="price">Prijs</label>
        <input type="text" id="price" name="price" placeholder="Prijs (bijv. 9.99)" required>

        <label for="stock">Voorraad</label>
        <input type="number" id="stock" name="stock" placeholder="Voorraad aantal" required>

        <button type="submit">Item Toevoegen</button>
    </form>

    <a href="addItem.php">Terug naar overzicht</a>
</div>
</body>
</html>