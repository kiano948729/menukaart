<?php
global $conn;
include 'backend/databaseConnect.php'; // Verbind met de database

// Geselecteerde of standaarddatum ophalen
$date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');

// Hardcoded tijdsloten van 17:00 tot 20:30 (elk half uur)
$timeSlots = [
    "17:00", "17:30", "18:00", "18:30",
    "19:00", "19:30", "20:00", "20:30"
];

// Haal reserveringen op uit de database voor de gekozen datum
$query = "SELECT time FROM reservations WHERE date = :date";
$stmt = $conn->prepare($query);
$stmt->bindParam(':date', $date);
$stmt->execute();
$reservedTimes = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Converteer tijden van 'HH:MM:SS' naar 'HH:MM' om overeen te komen met de tijdslots
$reservedTimes = array_map(function ($time) {
    return date("H:i", strtotime($time)); // Formatteer naar 'HH:MM'
}, $reservedTimes);

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beschikbare Tijden</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="POST" style="text-align: center;">
    <label for="date">Kies een datum:</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
    <button type="submit">Toon beschikbaarheid</button>
</form>

<table>
    <thead>
    <tr>
        <th>Tijd</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($timeSlots as $time): ?>
        <tr>
            <td><?php echo $time; ?></td>
            <td class="<?php echo in_array($time, $reservedTimes) ? 'unavailable' : 'available'; ?>">
                <?php echo in_array($time, $reservedTimes) ? 'Bezet' : 'Beschikbaar'; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>