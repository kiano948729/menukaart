<?php
require_once 'databaseConnect.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'])) {
    $reservationId = $_POST['reservation_id'];

    $query = "UPDATE reservations SET status = 'accepted' WHERE id = :id";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([':id' => $reservationId])) {
        $success = "Reservering succesvol geaccepteerd!";
    } else {
        $success = "Er is iets fout gegaan!";
    }
    header("Location: manageReservations.php");
    exit();
}