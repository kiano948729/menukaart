<?php
$categories = [
    [
        "name" => "Breakfast",
        "item_count" => 3,
        "color" => "#D8F3DC",
        "items" => [
            ["name" => "Pancakes", "price" => 5.99],
            ["name" => "Scrambled Eggs", "price" => 4.50],
            ["name" => "Croissant", "price" => 2.75]
        ]
    ],
    [
        "name" => "Soups",
        "item_count" => 3,
        "color" => "#FAD2E1",
        "items" => [
            ["name" => "Tomato Soup", "price" => 3.99],
            ["name" => "Chicken Soup", "price" => 4.50],
            ["name" => "Miso Soup", "price" => 3.25]
        ]
    ],
    [
        "name" => "Pasta",
        "item_count" => 3,
        "color" => "#BDE0FE",
        "items" => [
            ["name" => "Spaghetti Bolognese", "price" => 7.99],
            ["name" => "Penne Alfredo", "price" => 8.50],
            ["name" => "Lasagna", "price" => 9.25]
        ]
    ],
    [
        "name" => "Sushi",
        "item_count" => 3,
        "color" => "#CDB4DB",
        "items" => [
            ["name" => "California Roll", "price" => 6.99],
            ["name" => "Tuna Nigiri", "price" => 7.50],
            ["name" => "Salmon Sashimi", "price" => 8.25]
        ]
    ],
    [
        "name" => "Main course",
        "item_count" => 3,
        "color" => "#FFC8DD",
        "items" => [
            ["name" => "Grilled Chicken", "price" => 10.99],
            ["name" => "Steak & Fries", "price" => 14.50],
            ["name" => "Vegetable Stir Fry", "price" => 9.75]
        ]
    ],
    [
        "name" => "Desserts",
        "item_count" => 3,
        "color" => "#FFAFCC",
        "items" => [
            ["name" => "Chocolate Cake", "price" => 4.99],
            ["name" => "Ice Cream", "price" => 3.50],
            ["name" => "Cheesecake", "price" => 5.25]
        ]
    ],
    [
        "name" => "Drinks",
        "item_count" => 3,
        "color" => "#B5E48C",
        "items" => [
            ["name" => "Coca Cola", "price" => 2.50],
            ["name" => "Orange Juice", "price" => 3.00],
            ["name" => "Coffee", "price" => 2.75]
        ]
    ],
    [
        "name" => "Alcohol",
        "item_count" => 3,
        "color" => "#A0C4FF",
        "items" => [
            ["name" => "Red Wine", "price" => 6.50],
            ["name" => "Beer", "price" => 4.00],
            ["name" => "Whiskey", "price" => 8.75],
            ["name" => "Speed cola", "price" => 3000],
            ["name" => "Juggernaut", "price" => 2500]
        ]
    ]
];
//Dynamisch item_count bijwerken voor alle categorieën
foreach ($categories as &$category) {
    $category['item_count'] = count($category['items']);
}
unset($category); //Verbreek referentie om bugs te voorkomen

//Debug output om te controleren of het werkt
// print_r($categories);
?>