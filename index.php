<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý học sinh</title>

  <!-- W3.CSS Framework -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/responsive.css" />

  <script src="assets/scripts/index.js"></script>
</head>

<body>
  <main class="w3-card-4">

    <div id="modal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4 w3-round">
        <header class="w3-container w3-round w3-display-container">
          <span onclick="hideModal()"
            class="w3-btn w3-display-topright w3-round w3-display-right w3-margin-right w3-large">
            &times;
          </span>
          <h2 id="modal-title" class="w3-flex" style="align-items: center; gap: 10px;">
            <ion-icon name=""></ion-icon>
          </h2>
        </header>
        <div id="modal-content" class="w3-container w3-padding-large font-class">
          <p></p>
        </div>
      </div>
    </div>

    <div class="w3-container w3-blue w3-row w3-display-container">
      <a href="pages/register.php" class="font-class w3-btn w3-indigo w3-display-right w3-large w3-margin-right w3-padding-large w3-card-2 w3-round">
        Đăng kí
      </a>
      <h1 class="w3-xxlarge w3-center">Tìm kiếm thông tin</h1>
    </div>
    <form method="post" action="server/query.php" class="w3-container w3-border w3-padding-16">
      <div class="w3-container w3-row w3-section" style="width: 100%">
        <select name="category" id="" class="w3-select w3-col w3-center font-class" style="width: 25%">
          <option disabled value="allType">Tất cả</option>
          <option value="fullName">Họ và tên</option>
          <option value="studentID">Mã số học sinh</option>
          <option disabled value="identityCode">CCCD</option>
          <option disabled value="className">Lớp</option>
        </select>
        <div class="w3-rest">
          <input class="w3-input font-class" type="text" name="search-input" id="search-box"
            placeholder="Nhập thông tin..." required />
        </div>
      </div>
      <button type="submit" class="w3-btn w3-info w3-ripple w3-hover-blue w3-block w3-round w3-padding">
        Tìm kiếm
      </button>
    </form>
  </main>

  <?php
  if (isset($_SESSION['found']) && $_SESSION['found'] == 0) { ?>
    <script>
      showModal("error", "Thông báo lỗi", "Không tìm thấy nội dung !");
    </script>
  <?php
  }
  if (isset($_SESSION['creation']) && $_SESSION['creation'] == "success") { ?>
    <script>
      showModal("success", "Thành công", "Tạo tài khoản học sinh thành công!");
    </script>
  <?php
  }
  ?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>