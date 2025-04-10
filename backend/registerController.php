<?php
require_once 'databaseConnect.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    $query = "UPDATE reservations SET date = :date, time = :time, guests = :guests WHERE id = :id";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([':date' => $date, ':time' => $time, ':guests' => $guests, ':id' => $id])) {
        $success = "Reservering succesvol bijgewerkt!";
    } else {
        $success = "Er is iets fout gegaan!";
    }
    header("Location: ../menu.php");
    exit();
}