<?php

$action = $_POST['action'];

if ($action == "create") {
    //Variabelen vullen
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $voorraad = $_POST['voorraad'];
    

    //1. Verbinding
    require_once 'conn.php';

    //2. Query
    $query = "INSERT INTO taken (titel, beschrijving, prijs, voorraad, user) 
        VALUES (:titel, :beschrijving, :prijs, :voorraad, :user)";
    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":titel" => $titel, 
        ":beschrijving" => $beschrijving,
        ":prijs" => $prijs,
        ":voorraad" => $voorraad
    ]);

    header("Location: ../resource/items.php");
}

if ($action == 'update') {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $voorraad = $_POST['voorraad'];

    require_once 'conn.php';

    $query = "UPDATE items SET 
        titel = :titel,
        beschrijving = :beschrijving,
        prijs = :prijs,
        voorraad = :voorraad
        WHERE id = :id ";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":prijs" => $prijs,
        ":voorraad" => $voorraad,
        ":id" => $id
    ]);
    header("Location: ../resource/items.php");
}

if ($action == "delete") {

    $id = $_POST['id'];
    require_once 'conn.php';

    $query = "
        DELETE FROM taken
        WHERE id = :id
        ";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":id" => $id
    ]);
    header("Location: ../resource/items.php");
}
?>