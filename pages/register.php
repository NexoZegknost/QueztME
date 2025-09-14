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
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/responsive.css" />

  <script src="../assets/scripts/index.js"></script>
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
      <a href="../index.php" class="font-class w3-btn w3-indigo w3-display-left w3-large w3-margin-left w3-padding-large w3-card-2 w3-round">
        Trang chủ
      </a>
      <h1 class="w3-xxlarge w3-center">Đăng ký học sinh</h1>
    </div>

    <div class="wrapper w3-row w3-margin-top">
      <form method="post" action="../server/register.php" class="w3-card-4 w3-round-large font-class w3-twothird" style="overflow: hidden">
        <div class="w3-container w3-blue w3-center w3-margin-bottom">
          <h3>Đăng ký</h3>
        </div>

        <div class="w3-container w3-padding-large w3-margin-bottom w3-row">
          <div class="input-field w3-half w3-padding">
            <label for="fullname-field">Họ và tên</label>
            <input type="text" name="fullname" id="fullname-field" class="w3-input" required>
          </div>
          <div class="input-field w3-half w3-padding">
            <label for="username-field">Tên đăng nhập</label>
            <input type="text" name="username" id="username-field" class="w3-input" required>
          </div>
        </div>

        <div class="w3-container w3-padding-large w3-margin-bottom w3-row">
          <div class="input-field w3-half w3-padding">
            <label for="email-field">Email</label>
            <input type="email" name="email" id="email-field" class="w3-input" required>
          </div>
          <div class="input-field w3-half w3-padding">
            <label for="phone-field">Số điện thoại</label>
            <input type="text" name="phone" id="phone-field" class="w3-input" required>
          </div>
        </div>

        <div id="password-check-noti" class="w3-text-red w3-padding-large"></div>
        <div class="w3-container w3-padding-large w3-margin-bottom w3-row">
          <div class="input-field w3-half w3-padding">
            <label for="password-field">Mật khẩu</label>
            <input type="password" name="password" id="password-field" class="w3-input" required>
          </div>
          <div class="input-field w3-half w3-padding">
            <label for="repassword-field">Nhập lại mật khẩu</label>
            <input type="password" name="repassword" id="repassword-field" class="w3-input" required>
          </div>
        </div>

        <div class="w3-container w3-padding-large w3-margin-bottom w3-row">
          <div class="input-field w3-half w3-padding">
            <label for="icode-field">CCCD</label>
            <input type="text" name="icode" id="icode-field" class="w3-input" maxlength="12" required>
          </div>
          <div class="input-field w3-half w3-padding">
            <label for="mcode-field">BHYT</label>
            <input type="text" name="mcode" id="mcode-field" class="w3-input" required>
          </div>
        </div>

        <div class="w3-container w3-padding-large w3-margin-bottom w3-row">
          <div class="input-field w3-half w3-padding">
            <label for="class-field">Lớp</label>
            <input type="text" name="class" id="class-field" class="w3-input" required>
          </div>
          <div class="input-field w3-half w3-padding">
            <label for="year-field">Niên khóa</label>
            <input type="text" name="year" id="year-field" class="w3-input"
              value="<?php echo (int) date("Y") - 1 . " - " . date("Y"); ?>" required>
          </div>
        </div>

        <button class="w3-btn w3-indigo w3-block w3-padding-large">
          Đăng ký
        </button>

      </form>
    </div>

    <?php
    if (isset($_SESSION['creation']) && $_SESSION['creation'] == "password") { ?>
      <script>
        showModal("error", "Thông báo lỗi", "Mật khẩu không khớp!");
      </script>
    <?php
    } else if (isset($_SESSION['creation']) && $_SESSION['creation'] == "username/email") { ?>
      <script>
        showModal("error", "Thông báo lỗi", "Tên đăng nhập / email đã được sử dụng!");
      </script>
    <?php
    }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>