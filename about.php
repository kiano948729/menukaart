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

<body class="about-background">
<header>
    <div class="header-about">
    <?php require_once("components/header.php") ?>
    </div>
</header>

<main>
    <section class="about-hero">
        <div class="hero-text">
            <h1>Over Ons</h1>
            <p>Ontdek wat ons uniek maakt.</p>
        </div>
    </section>

    <section class="about-content">
        <div class="about-intro">
            <h2>Onze Filosofie</h2>
            <p>
                Bij [Bedrijfsnaam] draait alles om het creëren van een unieke ervaring.
                Van de zorgvuldige details in ons ontwerp tot de passie die we steken in ons werk.
            </p>
            <p>
                Door onze gasten samen te brengen, willen wij inspireren, verbinden, en uitzonderlijke
                momenten creëren die blijven hangen.
            </p>
        </div>
        <div class="about-images">
            <img src="img/indexImg/extra3.png" alt="Unieke sfeer">
            <img src="img/indexImg/extrafoto.png" alt="Gezellig samenzijn">
        </div>
    </section>

    <section class="about-values">
        <div class="value">
            <h3>Uitmuntendheid</h3>
            <p>
                Alles wat we doen, streven we op het hoogste niveau na om uw ervaring perfect te maken.
            </p>
        </div>
        <div class="value">
            <h3>Gemeenschap</h3>
            <p>
                Onze ruimtes zijn ontworpen om mensen samen te brengen en geweldige herinneringen te delen.
            </p>
        </div>
        <div class="value">
            <h3>Creativiteit</h3>
            <p>
                We houden ervan om unieke en inspirerende ervaringen tot leven te brengen.
            </p>
        </div>
    </section>
</main>

<footer>
    <?php require_once("components/footer.php") ?>
</footer>
</body>

</html>