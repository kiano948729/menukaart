<?php
require_once 'databaseConnect.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_reservation_id'])) {
    $deleteReservationId = $_POST['delete_reservation_id'];

    $query = "DELETE FROM reservations WHERE id = :id";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([':id' => $deleteReservationId])) {
        $success = "Reservering succesvol verwijderd!";
    } else {
        $success = "Er is iets fout gegaan!";
    }
    header("Location: addItem.php");
    exit();
}