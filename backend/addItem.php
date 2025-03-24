<?php
session_start();
require_once 'databaseConnect.php';
global $conn;

// Controleer of de gebruiker ingelogd is en admin is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Toegang geweigerd! Alleen admins mogen items toevoegen.");
}

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Validatie om te voorkomen dat lege velden worden opgeslagen
    if (empty($category_id) || empty($name) || empty($price) || !is_numeric($stock)) {
        $error = "Vul alle velden in correct in.";
    } else {
        // Item toevoegen aan de database
        $query = "INSERT INTO items (category_id, name, price, stock) VALUES (:category_id, :name, :price, :stock)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':category_id' => $category_id,
            ':name' => $name,
            ':price' => $price,
            ':stock' => $stock
        ]);
        $success = "Item succesvol toegevoegd!";
    }
}

// Haal beschikbare categorieën op voor de dropdown
$query = "SELECT id, name FROM categories";
$stmt = $conn->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Toevoegen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h1>Item Toevoegen</h1>

    <!-- Toon succes- of foutmelding -->
    <?php if (isset($success)): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php elseif (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form action="addItem.php" method="POST">
        <label for="category_id">Categorie</label>
        <select name="category_id" id="category_id" required>
            <option value="">Selecteer een categorie</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" placeholder="Item naam" required>

        <label for="price">Prijs</label>
        <input type="text" id="price" name="price" placeholder="Prijs (bijv. 10.99)" required>

        <label for="stock">Voorraad</label>
        <input type="number" id="stock" name="stock" placeholder="Aantal op voorraad" required>

        <button type="submit">Item Toevoegen</button>
    </form>
</div>
</body>
</html>