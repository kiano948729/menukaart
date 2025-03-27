<?php
session_start();
require_once 'databaseConnect.php';
global $conn;

// Controleer of de gebruiker ingelogd is en admin is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Toegang geweigerd! Alleen admins mogen items verwijderen.");
}

// Haal alle items op voor weergave
$query = "SELECT id, category_id, name, price, stock FROM items";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verwijder een item als een delete-verzoek is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item_id'])) {
    $deleteItemId = $_POST['delete_item_id'];

    $deleteQuery = "DELETE FROM items WHERE id = :id";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->execute([':id' => $deleteItemId]);

    // Verwerk een succesmelding
    $success = "Item succesvol verwijderd!";
    header("Location: deleteItems.php"); // Verwijst terug naar dezelfde pagina om POST te voorkomen
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Beheren</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h1>Items Beheren</h1>
    <a href="newItem.php">
        Nieuw Item Toevoegen
    </a>
    <a href="../menu.php">terug naar menu</a>


    <!-- Toon succesmelding indien een item succesvol werd verwijderd -->
    <?php if (isset($success)): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>

    <!-- Lijst van items met een delete-knop -->
    <?php if (!empty($items)): ?>
        <table>
            <thead>
            <tr>
                <th>Item Naam</th>
                <th>Prijs</th>
                <th>Voorraad</th>
                <th>categorie</th>
                <th>Actie</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>€<?= number_format($item['price'], 2, ',', '.') ?></td>
                    <td><?= intval($item['stock']) ?></td>
                    <td><?= htmlspecialchars($item['category_id']) ?></td>
                    <td>
                        <form method="POST" action="deleteItem.php" onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">
                            <input type="hidden" name="delete_item_id" value="<?= $item['id'] ?>">
                            <button type="submit" style="color: red;">Verwijder</button>
                        </form>
                    </td>
                    <td>
                        <form method="GET" action="updateItem.php">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen items gevonden.</p>
    <?php endif; ?>
</div>
</body>
</html>