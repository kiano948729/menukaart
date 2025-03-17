<?php
include 'backend/databaseConnect.php'; // Verbind met de database
global $conn;

// Haal categorieën op
$query = "SELECT id, name, color FROM categories";
$stmt = $conn->prepare($query);
$stmt->execute();
$dbCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Haal items op
$query = "SELECT id, name, price, stock, category_id FROM items";
$stmt = $conn->prepare($query);
$stmt->execute();
$dbItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verwerk de gegevens correct
$categories = [];
foreach ($dbCategories as $dbCategory) {
    // Maak de categorie-array met id als sleutel
    $categories[$dbCategory['id']] = [
        "name" => $dbCategory['name'],
        "item_count" => 0,
        "color" => $dbCategory['color'],
        "items" => [] // Initialiseer items-array
    ];
}

// Voeg items toe aan de corresponderende categorie
foreach ($dbItems as $dbItem) {
    $categoryId = $dbItem['category_id']; // Pak de ID van de categorie waartoe dit item behoort
    if (isset($categories[$categoryId])) {
        // Voeg het item toe aan de juiste categorie
        $categories[$categoryId]['items'][] = [
            "name" => $dbItem['name'],
            "price" => $dbItem['price'],
            "stock" => $dbItem['stock']
        ];
    }
}

// Dynamisch item_count bijwerken
foreach ($categories as &$category) {
    $category['item_count'] = count($category['items']);
}
unset($category); // Breek referentie na de foreach-loop