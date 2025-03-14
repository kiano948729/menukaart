<?php
include 'backend/databaseConnect.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['name'])) {
    $itemName = $data['name'];

    try {
        // Haal huidige voorraad op
        $stmt = $conn->prepare("SELECT stock FROM items WHERE name = :name");
        $stmt->bindParam(':name', $itemName);
        $stmt->execute();

        $item = $stmt->fetch();

        if ($item && $item['stock'] > 0) {
            // Verlaag de voorraad
            $newStock = $item['stock'] - 1;
            $updateStmt = $conn->prepare("UPDATE items SET stock = :stock WHERE name = :name");
            $updateStmt->bindParam(':stock', $newStock);
            $updateStmt->bindParam(':name', $itemName);
            $updateStmt->execute();

            echo json_encode(['success' => true, 'message' => 'Voorraad bijgewerkt']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Onvoldoende voorraad']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Geen gegevens verzonden']);
}
?>