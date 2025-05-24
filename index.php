<?php
require_once 'config.php';

// Handle search
$search_query = isset($_GET['query']) ? trim($_GET['query']) : '';
$city = isset($_GET['city']) ? trim($_GET['city']) : '';

$sql = "SELECT * FROM listings WHERE 1=1";
$params = [];

if (!empty($search_query)) {
    $sql .= " AND title LIKE :query";
    $params[':query'] = "%$search_query%";
}
if (!empty($city) && $city != 'all') {
    $sql .= " AND city = :city";
    $params[':city'] = $city;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thuê Phòng Trọ</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Header -->
  <div class="header">
    <div class="logo">
      <img src="logo/logo.png" alt="Logo">
    </div>
    <div class="nav">
      <a href="#">Cho thuê phòng trọ</a>
      <a href="#">Cho thuê nhà nguyên căn</a>
      <a href="#">Cho thuê căn hộ</a>
      <a href="#">Tìm người ở ghép</a>
    </div>
    <div class="auth-buttons">
      <a href="#" class="login">Đăng nhập</a>
      <a href="#" class="register">Đăng ký</a>
      <a href="#" class="post">Đăng tin</a>
    </div>
  </div>

  <!-- Search Section -->
  <div class="search-section">
    <form class="search-bar" method="GET" action="">
      <input type="text" name="query" placeholder="Tìm kiếm phòng trọ, nhà nguyên căn, căn hộ..." value="<?php echo htmlspecialchars($search_query); ?>">
      <select name="city">
        <option value="all" <?php echo $city == 'all' || empty($city) ? 'selected' : ''; ?>>Toàn quốc</option>
        <option value="Hồ Chí Minh" <?php echo $city == 'Hồ Chí Minh' ? 'selected' : ''; ?>>TP. Hồ Chí Minh</option>
        <option value="Hà Nội" <?php echo $city == 'Hà Nội' ? 'selected' : ''; ?>>Hà Nội</option>
        <option value="Đà Nẵng" <?php echo $city == 'Đà Nẵng' ? 'selected' : ''; ?>>Đà Nẵng</option>
      </select>
      <button type="submit">Tìm kiếm</button>
    </form>
    <div class="filters">
      <a href="?">Tất cả</a>
      <a href="?query=phòng trọ">Phòng trọ</a>
      <a href="?query=nhà nguyên căn">Nhà nguyên căn</a>
      <a href="?query=căn hộ">Căn hộ</a>
      <a href="?query=ở ghép">Ở ghép</a>
      <a href="?">Đặt lại</a>
    </div>
  </div>

  <!-- City Section -->
  <div class="city-section">
    <h2>Tìm kiếm chỗ thuê giá tốt</h2>
    <p>Công cụ tìm kiếm phòng trọ, nhà nguyên căn, căn hộ, chỗ ở, tìm người ở ghép nhanh chóng và hiệu quả</p>
    <div class="city-container">
      <div class="city-card">
        <img src="logo/hochiminh.jpeg" alt="Hồ Chí Minh">
        <h3>Hồ Chí Minh</h3>
      </div>
      <div class="city-card">
        <img src="logo/hanoi.jpeg" alt="Hà Nội">
        <h3>Hà Nội</h3>
      </div>
      <div class="city-card">
        <img src="logo/binhduong.jpeg" alt="Đà Nẵng">
        <h3>Đà Nẵng</h3>
      </div>
    </div>
  </div>

  <!-- Listings Section -->
  <div class="listings-section">
    <h2>Tin mới</h2>
    <div class="listings-container">
      <?php foreach ($listings as $listing): ?>
        <div class="listing-card">
          <?php if ($listing['is_new']): ?>
            <span class="label">Tin mới</span>
          <?php endif; ?>
          <img src="<?php echo htmlspecialchars($listing['image_url']); ?>" alt="Phòng trọ">
          <div class="listing-content">
            <h3><?php echo htmlspecialchars($listing['title']); ?></h3>
            <p class="price"><?php echo number_format($listing['price'], 0, ',', '.') . ' Triệu/tháng'; ?></p>
            <p><?php echo $listing['area'] . ' m² - ' . htmlspecialchars($listing['location']) . ', ' . htmlspecialchars($listing['city']); ?></p>
            <p class="rating"><?php echo str_repeat('🌟', $listing['rating']) . ' (' . $listing['rating'] . ')'; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- News Section -->
  <div class="news-section">
    <h2>Tin tức</h2>
    <div class="news-container">
      <div class="news-card">
        <img src="logo/sukien.jpg" alt="Tin tức">
        <div class="news-content">
          <p class="tag">CHỌNDỌNGRA</p>
          <p class="date">05/12/2024</p>
          <p>Có nên đầu tư vào căn hộ chung cư khi đã có đất cọc thuê trọ nhưng chưa ở?</p>
        </div>
      </div>
      <div class="news-card">
        <img src="logo/sukien.jpg" alt="Tin tức">
        <div class="news-content">
          <p class="tag">GNC5G5G8</p>
          <p class="date">09/03/2020</p>
          <p>[Chia sẻ] Kinh doanh cho thuê phòng trọ có phải đóng thuế gì hay không?</p>
        </div>
      </div>
      <div class="news-card">
        <img src="logo/sukien.jpg" alt="Tin tức">
        <div class="news-content">
          <p class="tag">GNC5G5G8</p>
          <p class="date">09/03/2020</p>
          <p>Những điều cần lưu ý trong việc quản lý nhà trọ</p>
        </div>
      </div>
      <div class="news-card">
        <img src="logo/sukien.jpg" alt="Tin tức">
        <div class="news-content">
          <p class="tag">GNC5G5G8</p>
          <p class="date">09/03/2020</p>
          <p>Căn thân khi đi tìm thuê phòng trọ, nhà trọ với sinh viên mới</p>
        </div>
      </div>
    </div>
    <a href="#" style="display: block; text-align: right; color: #e63946; margin-top: 10px;">Xem thêm ></a>
  </div>

  <!-- Services Section -->
  <div class="services-section">
    <h2>Cho thuê cùng Thuephongtro.com</h2>
    <p>Thông tin phòng trọ hàng đầu Việt Nam</p>
    <div class="services-stats">
      <div class="services-stat">
        <img src="logo/call.svg" alt="Người dùng">
        <p class="number">90.000+</p>
        <p>người dùng</p>
      </div>
      <div class="services-stat">
        <img src="logo/feat.svg" alt="Tin đăng">
        <p class="number">95.859+</p>
        <p>tin đăng</p>
      </div>
      <div class="services-stat">
        <img src="logo/house.svg" style="height: 450px; width: 500px;" alt="Hình minh họa">
        <p></p>
      </div>
    </div>
    <button>Bắt đầu ngay</button>
    <div class="services-container">
      <div class="service-card">
        <h3>CHO THUÊ PHÒNG TRỌ</h3>
        <ul>
          <li>Cho thuê phòng trọ Hồ Chí Minh</li>
          <li>Cho thuê phòng trọ Hà Nội</li>
          <li>Cho thuê phòng trọ Đà Nẵng</li>
          <li>Cho thuê phòng trọ Bình Dương</li>
          <li>Cho thuê phòng trọ Bà Rịa Vũng Tàu</li>
        </ul>
      </div>
      <div class="service-card">
        <h3>NHÀ NGUYÊN CĂN</h3>
        <ul>
          <li>Cho thuê nhà Hồ Chí Minh</li>
          <li>Cho thuê nhà Hà Nội</li>
          <li>Cho thuê nhà Đà Nẵng</li>
          <li>Cho thuê nhà Bình Dương</li>
          <li>Cho thuê nhà Bà Rịa Vũng Tàu</li>
        </ul>
      </div>
      <div class="service-card">
        <h3>CHO THUÊ CĂN HỘ</h3>
        <ul>
          <li>Cho thuê căn hộ Hà Nội</li>
          <li>Cho thuê căn hộ Đà Nẵng</li>
          <li>Cho thuê căn hộ Bình Dương</li>
          <li>Cho thuê căn hộ Bà Rịa Vũng Tàu</li>
        </ul>
      </div>
      <div class="service-card">
        <h3>TÌM NGƯỜI Ở GHÉP</h3>
        <ul>
          <li>Tìm người ở ghép Hồ Chí Minh</li>
          <li>Tìm người ở ghép Hà Nội</li>
          <li>Tìm người ở ghép Đà Nẵng</li>
          <li>Tìm người ở ghép Bình Dương</li>
          <li>Tìm người ở ghép Bà Rịa Vũng Tàu</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Footer Section -->
  <div class="footer-section">
    <div class="footer-column">
      <h3>Về chúng tôi</h3>
      <p>Website cho thuê phòng trọ, nhà trọ nhanh chóng và hiệu quả</p>
      <p>📍 32-34 Điện Biên Phủ, P.Đakao, Quận 1, TP.HCM</p>
      <p>📞 0938 346 879</p>
      <p>📧 nhatroviet@gmail.com</p>
    </div>
    <div class="footer-column">
      <h3>Giới thiệu</h3>
      <a href="#">Giới thiệu</a>
      <a href="#">Quy chế hoạt động</a>
      <a href="#">Chính sách bảo mật</a>
      <a href="#">Quy định sử dụng</a>
      <a href="#">Liên hệ</a>
    </div>
    <div class="footer-column">
      <h3>Hỗ trợ</h3>
      <a href="#">Bảng giá dịch vụ</a>
      <a href="#">Hướng dẫn đăng tin</a>
      <a href="#">Quy định đăng tin</a>
      <a href="#">Cơ chế giải quyết tranh chấp</a>
      <a href="#">Tin tức</a>
    </div>
    <div class="footer-column footer-payment">
      <h3>Phương thức thanh toán</h3>
      <img src="logo/visa.png" style="height: 30px; margin: 20px;" alt="Visa">
      <img src="logo/mastercard.jpg" style="height: 30px; margin: 20px;" alt="Mastercard">
      <img src="logo/JCB.jfif" style="height: 30px; margin: 20px;" alt="JCB">
      <img src="logo/viettin.jpg" style="height: 30px; margin: 20px;" alt="Internet Banking">
      <img src="logo/momo.png" style="height: 30px; margin: 20px;" alt="MoMo">
      <img src="logo/tien.png" style="height: 30px; margin: 20px;" alt="Tiền Mặt">
    </div>
  </div>
</body>
</html>