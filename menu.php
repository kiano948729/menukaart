<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<?php
include 'categories.php'; // Laad de tijdelijke data
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
    <div class="menu-main-div">
        <div class="menu-nav">
            <?php require_once("components/headerSecond.php") ?>
        </div>
        <div class="menu-page">
            <main>
                <div class="search-bar">
                    <form action="search.php" method="GET" class="search-container">
                        <input type="text" name="query" placeholder="Search">
                    </form>
                </div>
                <div class="menu-content">
                    <div id="main" class="tabcontentWork">
                        <p>fasdflahsdfjkahdlsfjahdsf</p>
                    </div>
                    <div id="second" class="tabcontentWork">
                        <p>sdfsfsfgsd</p>
                    </div>
                    <div id="third" class="tabcontentWork">
                        <div class="menu-height">
                            <div class="menu-main-container">
                                <div class="catogories-div">
                                    <div class="breakfast-main">
                                        <div class="items-catogorie-align">
                                            <i class="fa-solid fa-mug-hot"></i>
                                            <h1>Breakfast</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Breakfast"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="soups-main">
                                        <div class="items-catogorie-align">

                                        </div>
                                    </div>
                                    <div class="pasta-main">
                                        <div class="items-catogorie-align">

                                        </div>
                                    </div>
                                    <div class="sushi-main">
                                        <div class="items-catogorie-align">

                                        </div>
                                    </div>
                                </div>
                                <div class="catogories-div">
                                    <div class="soups-main">

                                    </div>
                                    <div class="breakfast-main">

                                    </div>
                                    <div class="soups-main">

                                    </div>
                                    <div class="sushi-main">

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="menu-container">
                               
                            </div>
                        </div>
                    </div>
                    <div id="fourth" class="tabcontentWork">
                        <p>sdfsfasdasdfasdfadsfsfgsd</p>
                    </div>
                    <div id="fifth" class="tabcontentWork">
                        <p>sdfsfsfgsd</p>
                    </div>
                </div>
            </main>
        </div>
        <div class="menu-table">

        </div>
    </div>
</body>

</html>