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
                        <div class="menu-container">
                            <?php foreach ($categories as $category): ?>
                                <div class="menu-block" onclick="openCategory('<?php echo $category['name']; ?>')">
                                    <h3><?php echo $category['name']; ?></h3>
                                    <p><?php echo $category['item_count']; ?> items</p>
                                </div>
                            <?php endforeach; ?>
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