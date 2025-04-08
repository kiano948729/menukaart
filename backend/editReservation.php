<form method="POST" action="editReservationController.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($reservation['id']) ?>">

    <label for="date">Datum:</label>
    <input type="date" id="date" name="date" value="<?= htmlspecialchars($reservation['date']) ?>" required>

    <label for="time">Tijd:</label>
    <input type="time" id="time" name="time" value="<?= htmlspecialchars($reservation['time']) ?>" required>

    <label for="guests">Aantal Gasten:</label>
    <input type="number" id="guests" name="guests" value="<?= intval($reservation['guests']) ?>" required>

    <button type="submit">Opslaan</button>
</form>