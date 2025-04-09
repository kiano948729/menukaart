<?php
// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ../contact.php");

    // Haal de formulier gegevens op
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    echo "Naam: $name<br>";
    echo "E-mail: $email<br>";
    echo "Bericht: $message<br>";

    // Schrijf de gegevens naar het contact.txt bestand
    $file = fopen("contact.txt", "a+");
    if ($file) {
        echo "Bestand is geopend!<br>";
        fwrite($file, "Naam: $name\n");
        fwrite($file, "E-mail: $email\n");
        fwrite($file, "Bericht: $message\n\n");
        fclose($file);
        echo "Gegevens zijn geschreven naar het bestand!<br>";

    } else {
        echo "Kan het bestand niet openen!<br>";
    }
} else {
    echo "Formulier is niet verzonden!<br>";
}
?>