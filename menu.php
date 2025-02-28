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
                                            <i class="fa-solid fa-mug-hot" style="font-size: 40px;"></i>
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
                                            <img src="img/gif/Ontwerp zonder titel (25).gif" alt="">
                                            <h1>Soups</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Soups"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="pasta-main">
                                        <div class="items-catogorie-align-boxI">
                                            <img src="img/gif/Ontwerp zonder titel (26).gif" alt="">
                                            <h1>Pasta</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Pasta"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="sushi-main">
                                        <div class="items-catogorie-align">
                                            <img src="img/gif/Ontwerp zonder titel (27).gif" alt="">
                                            <h1>Sushi</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Sushi"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="catogories-div">
                                    <div class="soups-main">
                                        <div class="items-catogorie-align-boxI">
                                            <img src="img/gif/Ontwerp zonder titel (28).gif" alt="">
                                            <h1>Maincourse</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Main course"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="breakfast-main">
                                        <div class="items-catogorie-align">
                                            <img src="img/gif/Ontwerp zonder titel (29).gif" alt="">
                                            <h1>Desserts</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Desserts"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="soups-main" onclick="openCategory('drinks')">
                                        <div class="items-catogorie-align-boxI">
                                            <img src="img/gif/Ontwerp zonder titel (30).gif" alt="">
                                            <h1>Drinks</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Drinks"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="sushi-main" onclick="openCategory('alcohol')">
                                        <div class="items-catogorie-align-boxI">
                                            <img src="img/gif/Ontwerp zonder titel (31).gif" alt="">
                                            <h1>Alcohol</h1>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Alcohol"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <!-- Hier worden de items van de categorie getoond -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="catogories-to-items">
                                <!-- hier moet de items van de catorgie komen -->
                                <div id="alcoholItems" class="item-section" style="display: none;">
                                    <div class="items-grid">
                                        <?php foreach ($categories as $category): ?>
                                            <?php if ($category['name'] === "Alcohol"): ?>
                                                <?php foreach ($category['items'] as $item): ?>
                                                    <div class="item-card">
                                                        <div class="item-header">
                                                            <span class="item-category">Alcohol</span>
                                                            <span
                                                                class="item-price">€<?php echo number_format($item['price'], 2); ?></span>
                                                        </div>
                                                        <h2 class="item-name"><?php echo $item['name']; ?></h2>
                                                        <div class="item-controls">
                                                            <button class="control-button">-</button>
                                                            <span class="item-quantity">0</span>
                                                            <button class="control-button">+</button>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- Einde catogorie items van Alcohol -->
                                <div id="drinksItems" class="item-section" style="display: none;">
                                    <div class="items-grid">
                                        <?php foreach ($categories as $category): ?>
                                            <?php if ($category['name'] === "Drinks"): ?>
                                                <?php foreach ($category['items'] as $item): ?>
                                                    <div class="item-card">
                                                        <div class="item-header">
                                                            <span class="item-category">Drinks</span>
                                                            <span
                                                                class="item-price">€<?php echo number_format($item['price'], 2); ?></span>
                                                        </div>
                                                        <h2 class="item-name"><?php echo $item['name']; ?></h2>
                                                        <div class="item-controls">
                                                            <button class="control-button">-</button>
                                                            <span class="item-quantity">0</span>
                                                            <button class="control-button">+</button>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- Einde catogorie items van Drinks -->
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
            <div class="menu-table-title">
                <h1>Table</h1><!-- hier moet nog een id komen voor de user die een table krijgt toegewezen -->
                <h2>user huppidup</h2><!-- hier moet de naam van de username nog komen -->
            </div>
            <div class="menu-table-checkout">
                <div class="menu-checkout">
                    <div class="item-check">

                    </div>
                    <div class="item-payment">
                        <h2 class="h2-item-check">Payement Method</h2>
                        <div class="payement-buttons">
                            <div class="payement-button">
                                <i class="fa-brands fa-cc-apple-pay" style="color: #7e7f81;"></i>
                            </div>
                            <div class="payement-button">
                                <i class="fa-solid fa-credit-card" style="color:#7e7f81;"></i>
                            </div>
                            <div class="payement-button">
                                <i class="fa-solid fa-credit-card" style="color:#7e7f81;"></i>
                            </div>
                        </div>
                        <div class="payement-buttons-text">
                            <div class="payement-text">
                                <h2>Apple pay</h2>
                            </div>
                            <div class="payement-text">
                                <h2>Debit card</h2>
                            </div>
                            <div class="payement-text">
                                <h2>Credit card</h2>
                            </div>
                        </div>
                    </div>
                    <div class="item-button">
                        <button>Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>