<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5321476408.js" crossorigin="anonymous"></script>
    <script src="../script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
</head>
<body class="login-body">
<header>
    <?php require_once("../components/headerThird.php") ?>
</header>
<main>
    <div class="login-align">
        <div class="login-container">
            <h2>registreren</h2>
            <form action="registerController.php" method="POST" class="login-form">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">registreren</button>
            </form>
        </div>
    </div>
</main>
<footer>
    <?php require_once("../components/footer.php") ?>
</footer>
</body>