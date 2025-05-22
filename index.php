<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thuê Phòng Trọ - Clone Frontend</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f5f7fa;
      color: #333;
    }

    /* Header */
    .header {
      background-color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 40px;
      margin-right: 10px;
    }

    .logo span {
      font-size: 20px;
      color: #e63946;
      font-weight: bold;
    }

    .nav a {
      text-decoration: none;
      color: #333;
      margin-left: 20px;
      font-size: 16px;
    }

    .nav a:hover {
      color: #e63946;
    }

    .auth-buttons a {
      margin-left: 10px;
      text-decoration: none;
      color: #fff;
      padding: 5px 10px;
      border-radius: 4px;
    }

    .auth-buttons .login {
      background-color: #007bff;
    }

    .auth-buttons .register {
      background-color: #28a745;
    }

    .auth-buttons .post {
      background-color: #e63946;
    }

    /* Search Section */
    .search-section {
      background-color: #fff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .search-bar {
      display: flex;
      justify-content: center;
      gap: 10px;
      max-width: 800px;
      margin: 0 auto;
    }

    .search-bar input {
      padding: 10px;
      width: 50%;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }

    .search-bar select {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }

    .search-bar button {
      padding: 10px 20px;
      background-color: #e63946;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .search-bar button:hover {
      background-color: #c2181f;
    }

    .filters {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .filters a {
      text-decoration: none;
      color: #333;
      font-size: 14px;
    }

    .filters a:hover {
      color: #e63946;
    }

    /* City Section */
    .city-section {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
      text-align: center;
    }

    .city-section h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #666;
    }

    .city-section p {
      font-size: 16px;
      color: #999;
      margin-bottom: 20px;
    }

    .city-container {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .city-card {
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 200px;
      text-align: center;
    }

    .city-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .city-card h3 {
      font-size: 18px;
      margin: 10px 0;
      color: #333;
    }

    /* Listings Section */
    .listings-section {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
    }

    .listings-section h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #666;
    }

    .listings-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .listing-card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .listing-card .label {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #e63946;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
    }

    .listing-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .listing-content {
      padding: 10px;
    }

    .listing-content h3 {
      font-size: 16px;
      margin-bottom: 5px;
      color: #333;
    }

    .listing-content .price {
      color: #e63946;
      font-weight: bold;
      font-size: 16px;
    }

    .listing-content p {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }

    .rating {
      color: #ff9800;
      font-size: 14px;
    }

    /* News Section */
    .news-section {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
    }

    .news-section h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #666;
    }

    .news-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
    }

    .news-card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .news-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .news-content {
      padding: 10px;
    }

    .news-content p {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }

    .news-content .date {
      font-size: 12px;
      color: #999;
    }

    .news-content .tag {
      font-size: 12px;
      color: #e63946;
      text-transform: uppercase;
      margin-bottom: 5px;
    }

    /* Services Section */
    .services-section {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      text-align: center;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .services-stats {
      display: flex;
      justify-content: space-around;
      width: 100%;
      margin-bottom: 20px;
    }

    .services-stat {
      text-align: center;
    }

    .services-stat img {
      width: 60px;
      height: 60px;
    }

    .services-stat p {
      font-size: 16px;
      color: #333;
      margin-top: 10px;
    }

    .services-stat .number {
      font-size: 24px;
      font-weight: bold;
      color: #1976d2;
    }

    .services-section button {
      padding: 10px 20px;
      background-color: #1976d2;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    .services-section button:hover {
      background-color: #1565c0;
    }

    .services-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      width: 100%;
      margin-top: 20px;
    }

    .service-card {
      text-align: center;
    }

    .service-card h3 {
      font-size: 16px;
      margin: 10px 0;
      color: #333;
    }

    .service-card ul {
      list-style: none;
      text-align: left;
      padding-left: 20px;
    }

    .service-card ul li {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }

    /* Footer Section */
    .footer-section {
      background-color: #1976d2;
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .footer-column {
      flex: 1;
      min-width: 200px;
      margin: 10px;
    }

    .footer-column h3 {
      font-size: 16px;
      margin-bottom: 10px;
      color: #fff;
    }

    .footer-column p {
      font-size: 14px;
      margin-bottom: 5px;
      color: #fff;
    }

    .footer-column a {
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
    }

    .footer-column a:hover {
      text-decoration: underline;
    }

    .footer-payment img {
      width: 40px;
      margin: 0 5px;
    }
  </style>
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
    <div class="search-bar">
      <input type="text" placeholder="Tìm kiếm phòng trọ, nhà nguyên căn, căn hộ...">
      <select>
        <option value="">Toàn quốc</option>
        <option value="hcm">TP. Hồ Chí Minh</option>
        <option value="hn">Hà Nội</option>
        <option value="dn">Đà Nẵng</option>
      </select>
      <button>Tìm kiếm</button>
    </div>
    <div class="filters">
      <a href="#">Tất cả</a>
      <a href="#">Phòng trọ</a>
      <a href="#">Nhà nguyên căn</a>
      <a href="#">Căn hộ</a>
      <a href="#">Ở ghép</a>
      <a href="#">Đặt lại</a>
    </div>
  </div>

  <!-- City Section -->
  <div class="city-section">
    <h2>Tim kiếm chỗ thuê giá tốt</h2>
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
      <div class="listing-card">
        <span class="label">Tin mới</span>
        <img src="logo/tro.jpg" alt="Phòng trọ">
        <div class="listing-content">
          <h3>Cho Thuê Phòng ở Đường Nguyễn Thị Minh Khai</h3>
          <p class="price">3.700.000 Triệu/tháng</p>
          <p>40 m² - Quận 1, Hồ Chí Minh</p>
          <p class="rating">🌟🌟🌟🌟🌟 (5)</p>
        </div>
      </div>
      <div class="listing-card">
        <span class="label">Tin mới</span>
        <img src="logo/tro.jpg" alt="Phòng trọ">
        <div class="listing-content">
          <h3>Cho thuê phòng 40 m² tại đường Nguyễn Thị Minh Khai</h3>
          <p class="price">3.5 Triệu/tháng</p>
          <p>40 m² - Quận 1, Hồ Chí Minh</p>
          <p class="rating">🌟🌟🌟🌟 (4)</p>
        </div>
      </div>
      <div class="listing-card">
        <img src="logo/tro.jpg" alt="Phòng trọ">
        <div class="listing-content">
          <h3>Cho thuê phòng tại đường Bùi Thị Xuân</h3>
          <p class="price">2.5 Triệu/tháng</p>
          <p>25 m² - Quận 1, Hồ Chí Minh</p>
          <p class="rating">🌟🌟🌟 (3)</p>
        </div>
      </div>
      <div class="listing-card">
        <img src="logo/tro.jpg" alt="Phòng trọ">
        <div class="listing-content">
          <h3>Cho thuê nhà nguyên căn tại đường Phan Anh</h3>
          <p class="price">6.000.000 Triệu/tháng</p>
          <p>45 m² - Quận 10, Hồ Chí Minh</p>
          <p class="rating">🌟🌟🌟 (3)</p>
        </div>
      </div>
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
        <br><br><br><br><br><br><br><br><br>
        <img src="logo/call.svg" alt="Người dùng">
        <p class="number">90.000+</p>
        <p>người dùng</p>
      </div>
      <div class="services-stat">
                <br><br><br><br><br><br><br><br><br>

        <img src="logo/feat.svg" alt="Tin đăng">
        <p class="number">95.859+</p>
        <p>tin đăng</p>
      </div>
      <div class="services-stat">
        <img src="logo/house.svg" style="height: 450px; width: 500px;;" alt="Hình minh họa">
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
  <script>
    document.querySelector('.search-bar button').addEventListener('click', () => {
      const query = document.querySelector('.search-bar input').value;
      const area = document.querySelector('.search-bar select').value;
      alert(`Tìm kiếm: ${query} tại ${area || 'Toàn quốc'}`);
    });
  </script>
</body>
</html>