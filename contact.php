<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <title>Over Ons</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/5321476408.js" crossorigin="anonymous"></script>
</head>

<body class="contact-background">
<header>
    <div class="header-about">
        <?php require_once("components/headerThird.php") ?>
    </div>
</header>
<main>
    <div class="contact-background-image">
        <section class="about-hero">
            <div class="hero-text">
                <h1>Contact Us</h1>
            </div>
        </section>
    </div>
    <div class="contact-main-div1">
        <section class="contact-section">
            <h1>Contact</h1>
            <p>Heb je vragen of wil je gewoon hallo zeggen? Vul het onderstaande formulier in en ik neem zo snel mogelijk
                contact met je op!</p>
            <form action="backend/submit_contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Bericht:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" value="Verstuur" class="submit-btn">Verstuur</button>
            </form>
        </section>
    </div>

</main>
<footer>
    <?php require_once("components/footer.php") ?>
</footer>
</body>

</html>