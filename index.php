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
</head>

<body>
  <main class="w3-card-4">
    <div class="w3-container w3-blue">
      <h1 class="w3-xxlarge w3-center">Tìm kiếm thông tin</h1>
    </div>
    <form
      method="post"
      action="server/query.php"
      class="w3-container w3-border w3-padding-16">
      <div class="w3-container w3-row w3-section" style="width: 100%">
        <select
          name="category"
          id=""
          class="w3-select w3-col w3-center"
          style="width: 25%">
          <option disabled value="allType">Tất cả</option>
          <option value="fullName">Họ và tên</option>
          <option value="studentID">Mã số học sinh</option>
          <option value="identityCode">CCCD</option>
          <option value="className">Lớp</option>
        </select>
        <div class="w3-rest">
          <input
            class="w3-input font-class"
            type="text"
            name="search-input"
            id="search-box"
            placeholder="Nhập thông tin..." />
        </div>
      </div>
      <button
        type="submit"
        class="w3-btn w3-info w3-ripple w3-hover-blue w3-block w3-round w3-padding">
        Search
      </button>
    </form>
  </main>
</body>

</html>