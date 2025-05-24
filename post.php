<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Tin</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="header">
    <div class="logo">
      <img src="logo/logo.png" alt="Logo">
    </div>
    <div class="nav">
      <a href="index.php">Trang chủ</a>
    </div>
    <div class="auth-buttons">
      <a href="logout.php" class="login">Đăng xuất</a>
    </div>
  </div>

  <div style="max-width: 800px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <h2>Đăng Tin Cho Thuê</h2>
    <form method="POST" action="submit_post.php">
      <div style="margin-bottom: 15px;">
        <label>Tiêu đề:</label><br>
        <input type="text" name="title" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
      </div>
      <div style="margin-bottom: 15px;">
        <label>Giá (VNĐ/tháng):</label><br>
        <input type="number" name="price" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
      </div>
      <div style="margin-bottom: 15px;">
        <label>Diện tích (m²):</label><br>
        <input type="number" name="area" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
      </div>
      <div style="margin-bottom: 15px;">
        <label>Địa chỉ:</label><br>
        <input type="text" name="location" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
      </div>
      <div style="margin-bottom: 15px;">
        <label>Thành phố:</label><br>
        <select name="city" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
          <option value="Hồ Chí Minh">Hồ Chí Minh</option>
          <option value="Hà Nội">Hà Nội</option>
          <option value="Đà Nẵng">Đà Nẵng</option>
        </select>
      </div>
      <button type="submit" style="padding: 10px 20px; background-color: #e63946; color: white; border: none; border-radius: 4px; cursor: pointer;">Đăng tin</button>
    </form>
  </div>
</body>
</html>