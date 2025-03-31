<?php
global $conn;
$current_page = basename($_SERVER['PHP_SELF']);
include 'categories.php';
include 'backend/databaseConnect.php';
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
                    <input type="text" name="query"
                           placeholder="Search"><?php if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin'): ?>
                        <button type="button" onclick="window.location.href='backend/addItem.php'">Beheerderspaneel
                        </button>
                    <?php endif; ?>

                </form>
            </div>
            <div class="menu-content">
                <div id="main" class="tabcontentWork">
                    <div class="reservation-container">
                        <h1>Reservations</h1>
                        <p>Hier kunt u uw reserveringen bekijken en beheren.</p>
                        <form id="reservationForm" method="POST" action="categories.php">
                            <input type="hidden" name="reservation" value="1"> <!-- Verborgen veld -->

                            <p>Naam: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
                            <!-- Ingelogde username -->

                            <label for="email">E-mailadres:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="date">Datum:</label>
                            <input type="date" id="date" name="date" required>

                            <label for="time">Tijd:</label>
                            <select id="time" name="time" required>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                            </select>


                            <label for="guests">Aantal gasten:</label>
                            <input type="number" id="guests" name="guests" min="1" required>

                            <button type="submit">Reserveren</button>
                        </form>
                        <?php require_once("backend/reservationTable.php") ?>

                    </div>
                </div>
                <div id="second" class="tabcontentWork">
                    <p>sdfsfsfgsd</p>
                </div>
                <div id="third" class="tabcontentWork">
                    <div class="menu-height">
                        <div class="menu-main-container">
                            <div class="catogories-div">
                                <div class="breakfast-main" onclick="openCategory('breakfast')">
                                    <div class="items-catogorie-align-boxI">
                                        <i class="fa-solid fa-mug-hot" style="font-size: 40px;"></i>
                                        <h1>Breakfast</h1>
                                        <?php
                                        if (isset($categories) && is_array($categories)):
                                            foreach ($categories as $category): ?>
                                                <?php if ($category['name'] === "Breakfast"): ?>
                                                    <p><?php echo $category['item_count']; ?> items</p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No categories available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="soups-main" onclick="openCategory('soups')">
                                    <div class="items-catogorie-align-boxI">
                                        <img src="img/gif/Ontwerp zonder titel (25).gif" alt="">
                                        <h1>Soups</h1>
                                        <?php foreach ($categories as $category): ?>
                                            <?php if ($category['name'] === "Soups"): ?>
                                                <p><?php echo $category['item_count']; ?> items</p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="pasta-main" onclick="openCategory('pasta')">
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
                                <div class="sushi-main" onclick="openCategory('sushi')">
                                    <div class="items-catogorie-align-boxI">
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
                                <div class="soups-main" onclick="openCategory('main course')">
                                    <div class="items-catogorie-align-boxI">
                                        <img src="img/gif/Ontwerp zonder titel (28).gif" alt="">
                                        <h1>Main course</h1>
                                        <?php foreach ($categories as $category): ?>
                                            <?php if ($category['name'] === "Main Course"): ?>
                                                <p><?php echo $category['item_count']; ?> items</p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="breakfast-main" onclick="openCategory('desserts')">
                                    <div class="items-catogorie-align-boxI">
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
                            <div id="breakfastItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Breakfast"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="soupsItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Soups"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="pastaItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Pasta"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+

                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="sushiItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Sushi"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+

                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Einde catogorie items van Alcohol -->

                            <div id="main courseItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Main Course"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="dessertsItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Desserts"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="drinksItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Drinks"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-
                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price'] ?>">+

                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="alcoholItems" class="item-section" style="display: none;">
                                <div class="items-grid">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category['name'] === "Alcohol"): ?>
                                            <div class="category-section" id="alcoholItems">
                                                <h2><?php echo $category['name']; ?></h2>
                                                <!-- Grid container voor producten -->
                                                <div class="items-grid">
                                                    <?php foreach ($category['items'] as $item): ?>
                                                        <div class="item">
                                                            <div class="item-details">
                                                                <p>Product:
                                                                    <strong><?php echo $item['name']; ?></strong></p>
                                                                <p>Prijs:
                                                                    €<?php echo number_format($item['price'], 2); ?></p>
                                                                <p>Stock: <span class="item-stock"
                                                                                data-name="<?php echo $item['name']; ?>">
                                                                <?php echo $item['stock']; ?></span></p>
                                                            </div>
                                                            <!-- Controls voor hoeveelheid -->
                                                            <div class="item-controls">
                                                                <button class="decrease-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">-

                                                                </button>
                                                                <span class="item-quantity"
                                                                      data-name="<?php echo $item['name']; ?>">0</span>
                                                                <button class="increase-btn"
                                                                        data-name="<?php echo $item['name']; ?>"
                                                                        data-price="<?php echo $item['price']; ?>">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
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

    <div id="menu-table-checkout" class="hidden">
        <div class="menu-table">
            <div class="menu-table-title">
                <h1>Table</h1><!-- hier moet nog een id komen voor de user die een table krijgt toegewezen -->
                <h2>user <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "Guest";
                    }
                    ?>

                </h2>
            </div>
            <div class="menu-table-checkout">
                <div class="menu-checkout">
                    <div class="item-check">
                        <div id="cart" class="cart-container">
                            <ul id="cart-items"></ul>
                        </div>
                    </div>
                    <div class="item-payment">
                        <h2 class="h2-item-check">Payement Method, prijs: <span id="total-price">€0.00</span></h2>
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
</div>
</body>

</html>