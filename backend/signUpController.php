<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "
        SELECT * FROM users WHERE username = :username
    ";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":username" => $username
]);

//5. Retrieve data
$user = $statement->fetch(PDO::FETCH_ASSOC);


if($user){
    
}

$_SESSION['user_id'] = $user['id'];
header("Location: ../index.php");
?>