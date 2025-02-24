<?php
$current_page = basename($_SERVER['PHP_SELF']);
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
                <div class="main-first-div">
                    <h1><span class="together-span">Together</span>, <img src="img/symbol copy.png">we grow</h1>
                    <h1>a greener and<span class="more-span"> more</span></h1>
                    <h1><span class="sus-span">sustainable</span> future.</h1>
                </div>


                <div class="main-second-div">
                    <div class="second-round-div">
                        <div class="round-div">
                            <div></div>
                        </div>
                        <div class="round-not-div">
                            <p>100% eco friendly energy</p>
                        </div>
                    </div>
                    <div class="second-round-down-div">
                        <div class="down-div">
                            <img src="img/ecosymbols.png" alt="none">
                        </div>
                        <div class="down-second-div">
                            <h1>join</h1>
                        </div>
                    </div>
                    <div class="second-button-bar">
                        <a href="#">about</a>
                        <a href="#">dine + drink</a>
                        <a href="#">catering</a>
                        <a href="#">what's on</a>

                    </div>
                </div>
            </div>
            <div class="lower-main">
                <div class="lower-main-div">
                    <!-- <img src="img/logogorund.png"> -->
                </div>
                <div class="lower-main-div-second">

                </div>
                <div class="lower-main-div-third">

                </div>
                <div class="lower-main-div-fourth">

                </div>
                <div class="lower-main-div-fifth">
                    
                </div>
            </div>
    </div>
    </main>
    </div>
</body>

</html>