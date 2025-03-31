<?php
session_start();
include 'backend/databaseConnect.php'; // Verbind met de database
global $conn;


// Controleer of het een POST-verzoek is en bevat reserveringsgegevens
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reservation'])) {
    $user_id = $_SESSION['user_id']; // Haal de user ID op uit de sessie
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    try {
        $query = "INSERT INTO reservations (user_id, email, date, time, guests) 
                  VALUES (:user_id, :email, :date, :time, :guests)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // Koppel de ingelogde gebruiker
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':guests', $guests);
        $stmt->execute();

        header("Location: ../menu.php");
        exit;

    } catch (PDOException $e) {
        echo "Fout bij het verwerken van de reservering: " . $e->getMessage();
    }
}



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
?>