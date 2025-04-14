<?php
session_start();
require_once 'databaseConnect.php';
global $conn;

// Controleer of de gebruiker ingelogd is en admin is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    ?><a href="../menu.php">Terug naar menu</a><?php
    die("Toegang geweigerd! Alleen admins mogen items bewerken.");
}

// Controleer of een item ID is opgegeven in de querystring
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Geen geldig item ID opgegeven.");
}

$itemId = intval($_GET['id']);

// Haal de gegevens van het item op uit de database
$query = "SELECT * FROM items WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $itemId]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

// Controleer of het item bestaat
if (!$item) {
    die("Item niet gevonden.");
}

// Handler voor het bijwerken van het item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Validatie om lege velden of ongeldige invoer tegen te gaan
    if (empty($name) || empty($price) || !is_numeric($stock)) {
        $error = "Vul alle velden correct in.";
    } else {
        // Update item in de database
        $updateQuery = "UPDATE items SET name = :name, price = :price, stock = :stock WHERE id = :id";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':stock' => $stock,
            ':id' => $itemId
        ]);

        $success = "Item succesvol bijgewerkt!";
        // Herlaad de pagina om POST te voorkomen
        header("Location: addItem.php?id=" . $itemId);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Bijwerken</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h1>Item Bijwerken</h1>

    <!-- Toon fout- of succesmeldingen -->
    <?php if (isset($success)): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php elseif (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- Formulier om item te bewerken -->
    <form action="updateItem.php?id=<?= $item['id'] ?>" method="POST">
        <label for="name">Naam</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>

        <label for="price">Prijs</label>
        <input type="text" id="price" name="price" value="<?= htmlspecialchars($item['price']) ?>" required>

        <label for="stock">Voorraad</label>
        <input type="number" id="stock" name="stock" value="<?= intval($item['stock']) ?>" required>

        <button type="submit">Bijwerken</button>
    </form>

    <a href="addItem.php">Terug naar lijst</a>
</div>
</body>
</html>