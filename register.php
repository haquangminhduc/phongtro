<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, full_name, email, password) VALUES (:username, :full_name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':full_name' => $full_name,
        ':email' => $email,
        ':password' => $password
    ]);

    header("Location: login.php");
    exit;
}
?>
<form method="POST">
    <label>Username:</label><input type="text" name="username" required><br>
    <label>Full Name:</label><input type="text" name="full_name" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <button type="submit">Đăng ký</button>
</form>