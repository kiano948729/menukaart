<?php
global $conn;
$current_page = basename($_SERVER['PHP_SELF']);
?>
<?php
session_start();
require_once 'backend/databaseConnect.php';

// Controleer of er een ingelogde gebruiker is
$current_user = null;
if (isset($_SESSION['user_id'])) {
    $query = "SELECT username FROM users WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([':id' => $_SESSION['user_id']]);
    $current_user = $statement->fetch(PDO::FETCH_ASSOC)['username'];
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <title>Menu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5321476408.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
</head>

<body>
<div class="body-background">
    <header>
        <?php require_once("components/header.php") ?>
    </header>
    <main>
        <div class="main-div">
            <div class="main-number-nav">
                <div><h1>01</h1></div>
                <div><h1>02</h1></div>
                <div><h1>03</h1></div>
                <div><h1>04</h1></div>
                <div><h1>05</h1></div>
            </div>
            <div class="main-number-nav-text">
                <div>
                    <h2>01.05</h2>
                    <h1>The Grounds:</h1>
                    <h1>Pure Smaak Genot</h1>
                    <p>Een culinaire ervaring waar smaak centraal staat.</p>
                </div>
                <div>
                    <h2>02.05</h2>
                    <h1>Dineren met</h1>
                    <h1>een Verhaal</h1>
                    <p>Bij The Grounds proef je passie en creativiteit.
                    </p>
                </div>
                <div>
                    <h2>03.05</h2>
                    <h1>Het Hart</h1>
                    <h1>van Gastronomie</h1>
                    <p>Een culinaire ervaring waar smaak centraal staat.</p>
                </div>
                <div>
                    <h2>04.05</h2>
                    <h1>The Grounds:</h1>
                    <h1>Altijd Vers Genoten</h1>
                    <p>Onze gerechten worden met liefde en lokale ingrediënten bereid
                    </p>
                </div>
                <div>
                    <h2>05.05</h2>
                    <h1>Meer dan</h1>
                    <h1>een Restaurant</h1>
                    <p>Een unieke beleving voor iedere fijnproever
                    </p>
                </div>
            </div>
        </div>
        <div class="main-lower-nav">
            <div class="main-lower-nav-slogan">
                <h1>Welkom bij ons restaurant!</h1>
            </div>
            <div class="main-lower-nav-text">
                <div>
                    <h2>02</h2>
                    <h1>Gallerie</h1>
                    <p>Natuurlijke plaatsen </p>
                </div>
                <div>
                    <h2>03</h2>
                    <h1>Menu</h1>
                    <p>Heerlijk eten</p>
                </div>
                <div>
                    <img src="img/img_4.png" alt="gnf">
                </div>
            </div>
        </div>
    </main>
</div>
</body>

</html>