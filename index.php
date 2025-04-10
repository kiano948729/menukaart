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

<body class="body-color">
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
        </div>>
        <div class="lower-info">
            <div class="lower-info-text">
                <h1>DINE + DRINK</h1>
                <a href="menu.php"><h1>View All</h1></a>
            </div>
            <div class="lower-info-img">
                <div class="lower-info-img-1">
                    <img src="img/indexImg/img.png" alt="gnf">
                    <p>SOUTH EVELEIGH</p>
                    <h2>The Coffee Factory</h2>
                    <p>Savour wholesome food and great coffee amongst the working machinery of The Coffee Factory's
                        working
                        roastery.</p>
                    <div class="lower-info-img-1-links">
                        <a href="menu.php">book table</a>
                        <a href="menu.php">view menu</a>
                    </div>
                </div>
                <div class="lower-info-img-1">
                    <img src="img/indexImg/img_1.png" alt="gnf">
                    <p>ALEXANDRIA</p>
                    <h2>The Grounds Cafe</h2>
                    <p>Sit back and enjoy a hearty meal & sweet treats in one of Sydney's most iconic eateries.</p>
                    <div class="lower-info-img-1-links">
                        <a href="menu.php">book table</a>
                        <a href="menu.php">view menu</a>
                    </div>
                </div>
                <div class="lower-info-img-1">
                    <img src="img/indexImg/img_2.png" alt="gnf">
                    <p>ALEXANDRIA</p>
                    <h2>The Potting Shed</h2>
                    <p>Surround yourself with lush greenery at The Potting Shed and enjoy fresh seasonal dishes with a
                        cheeky tipple or two.</p>
                    <div class="lower-info-img-1-links">
                        <a href="menu.php">book table</a>
                        <a href="menu.php">view menu</a>
                    </div>
                </div>
            </div>
            <div class="lower-info-img-hr">
                <hr class="lower-info-hr">
            </div>
        </div>
        <?php require_once("components/footer.php") ?>
    </main>
</div>
</body>

</html>