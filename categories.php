<?php
$categoryColors = [
    'Alcohol' => '#1E90FF', // Blauw
    'Main Course' => '#FF4500', // Rood
    'Desserts' => '#FFD700', // Goud
    // Voeg nieuwe categorieën en kleuren toe als nodig
];

$categories = [
    [
        "name" => "Breakfast",
        "item_count" => 0,
        "color" => "#D8F3DC",
        "items" => [
            ["name" => "Pancakes", "price" => 5.99, "stock" => 20],
            ["name" => "Scrambled Eggs", "price" => 4.50, "stock" => 15],
            ["name" => "Croissant", "price" => 2.75, "stock" => 25]
        ]
    ],
    [
        "name" => "Soups",
        "item_count" => 0,
        "color" => "#FAD2E1",
        "items" => [
            ["name" => "Tomato Soup", "price" => 3.99, "stock" => 30],
            ["name" => "Chicken Soup", "price" => 4.50, "stock" => 10],
            ["name" => "Miso Soup", "price" => 3.25, "stock" => 20]
        ]
    ],
    [
        "name" => "Pasta",
        "item_count" => 0,
        "color" => "#BDE0FE",
        "items" => [
            ["name" => "Spaghetti Bolognese", "price" => 7.99, "stock" => 18],
            ["name" => "Penne Alfredo", "price" => 8.50, "stock" => 12],
            ["name" => "Lasagna", "price" => 9.25, "stock" => 7]
        ]
    ],
    [
        "name" => "Sushi",
        "item_count" => 0,
        "color" => "#CDB4DB",
        "items" => [
            ["name" => "California Roll", "price" => 6.99, "stock" => 20],
            ["name" => "Tuna Nigiri", "price" => 7.50, "stock" => 14],
            ["name" => "Salmon Sashimi", "price" => 8.25, "stock" => 10]
        ]
    ],
    [
        "name" => "Main course",
        "item_count" => 0,
        "color" => "#FFC8DD",
        "items" => [
            ["name" => "Grilled Chicken", "price" => 10.99, "stock" => 8],
            ["name" => "Steak & Fries", "price" => 14.50, "stock" => 5],
            ["name" => "Vegetable Stir Fry", "price" => 9.75, "stock" => 12]
        ]
    ],
    [
        "name" => "Desserts",
        "item_count" => 0,
        "color" => "#FFAFCC",
        "items" => [
            ["name" => "Chocolate Cake", "price" => 4.99, "stock" => 22],
            ["name" => "Ice Cream", "price" => 3.50, "stock" => 30],
            ["name" => "Cheesecake", "price" => 5.25, "stock" => 16]
        ]
    ],
    [
        "name" => "Drinks",
        "item_count" => 0,
        "color" => "#B5E48C",
        "items" => [
            ["name" => "Coca Cola", "price" => 2.50, "stock" => 40],
            ["name" => "Orange Juice", "price" => 3.00, "stock" => 35],
            ["name" => "Coffee", "price" => 2.75, "stock" => 50]
        ]
    ],
    [
        "name" => "Alcohol",
        "item_count" => 0,
        "color" => "#A0C4FF",
        "items" => [
            ["name" => "Red Wine", "price" => 6.50, "stock" => 12],
            ["name" => "Beer", "price" => 4.00, "stock" => 18],
            ["name" => "Whiskey", "price" => 8.75, "stock" => 9],
            ["name" => "Speed cola", "price" => 3000, "stock" => 16],
            ["name" => "Juggernaut", "price" => 2500, "stock" => 8]
        ]
    ]
];

// Dynamisch item_count bijwerken voor alle categorieën
foreach ($categories as &$category) {
    $category['item_count'] = count($category['items']);
}
unset($category); // Verbreek referentie om bugs te voorkomen

// Debug output om te controleren of het werkt
// print_r($categories);
?>