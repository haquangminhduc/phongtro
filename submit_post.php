<?php
session_start();
require_once 'config.php';

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $price = floatval($_POST['price']);
    $area = intval($_POST['area']);
    $location = trim($_POST['location']);
    $city = trim($_POST['city']);

    // Insert into database
    $sql = "INSERT INTO listings (title, price, area, location, city, is_new) VALUES (:title, :price, :area, :location, :city, TRUE)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':price' => $price,
        ':area' => $area,
        ':location' => $location,
        ':city' => $city
    ]);

    // Redirect back to homepage
    header("Location: index.php");
    exit;
}
?>