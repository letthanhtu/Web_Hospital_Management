<?php
include_once('include/config.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['full_name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
  if ($query) {
    echo "<script>alert('Đã đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Registration</title>

  <link
    href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
    rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
  <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
  <style>
    /* Định dạng tổng thể cho form */
    .form-login fieldset {
      border: 2px solid #007bff;
      border-radius: 10px;
      background-color: #e6f7ff;
      padding: 20px;
    }

    /* Tiêu đề bên trong form */
    .form-login legend {
      color: #007bff;
      font-size: 20px;
      font-weight: bold;
      padding: 0 10px;
    }

    /* Định dạng cho khung nhập liệu */
    .form-login .form-control {
      border: 2px solid #007bff;
      background-color: #e6f7ff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px 15px;
      font-size: 16px;
      transition: all 0.3s ease-in-out;
    }

    /* Hiệu ứng khi focus vào ô nhập */
    .form-login .form-control:focus {
      border-color: #0056b3;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      outline: none;
    }

    /* Định dạng nút Submit */
    .form-login .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      padding: 10px 20px;
      transition: all 0.3s ease-in-out;
    }

    /* Hiệu ứng khi rê chuột vào nút */
    .form-login .btn-primary:hover {
      background-color: #0056b3;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Định dạng cho khung chứa form */
    .box-register {
      border: 2px solid #007bff;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      padding: 30px;
      background-color: #ffffff;
    }

    /* Liên kết trong phần "Đã có tài khoản" */
    .form-actions a {
      color: #007bff;
      font-weight: bold;
      text-decoration: none;
    }

    .form-actions a:hover {
      text-decoration: underline;
    }

    /* Logo và tiêu đề */
    .logo h2 {
      color: #007bff;
      font-weight: bold;
      text-align: center;
    }
  </style>





</head>

<body class="login">
  <div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="logo margin-top-30">
        <img src="assets/images/logo.png" alt="Clip-Two" />
        <h2>WECARE | Đăng ký</h2>
      </div>

      <div class="box-register">
        <form name="registration" id="registration" method="post">
          <fieldset>
            <legend>
              Đăng ký
            </legend>
            <p>
              Nhập thông tin cá nhân của bạn dưới đây:
            </p>
            <div class="form-group">
              <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="city" placeholder="City" required>
            </div>
            <div class="form-group">
              <label class="block">
                Giới tính
              </label>
              <div class="clip-radio radio-primary">
                <input type="radio" id="rg-female" name="gender" value="Nữ">
                <label for="rg-female">
                  Nữ
                </label>
                <input type="radio" id="rg-male" name="gender" value="Nam">
                <label for="rg-male">
                  Nam
                </label>
              </div>
            </div>
            <p>
              Nhập chi tiết tài khoản của bạn dưới đây:
            </p>
            <div class="form-group">
              <span class="input-icon">
                <input type="email" class="form-control" name="email" id="email"
                  onBlur="userAvailability()" placeholder="Email" required>
                <i class="fa fa-envelope"></i> </span>
              <span id="user-availability-status1" style="font-size:12px;"></span>
            </div>
            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Password" required>
                <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" name="password_again"
                  placeholder="Password Again" required>
                <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
              <div class="checkbox clip-check check-primary">
                <input type="checkbox" id="agree" value="agree">
                <label for="agree">
                  I agree
                </label>
              </div>
            </div>
            <div class="form-actions">
              <p>

                Đã có tài khoản?
                <a href="user-login.php">
                  Đăng nhập
                </a>
              </p>
              <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
                Submit <i class="fa fa-arrow-circle-right"></i>
              </button>
            </div>
          </fieldset>
        </form>

        <div class="copyright">
          &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>
            Tất cả
            quyền truy cập
          </span>
        </div>

      </div>

    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/modernizr/modernizr.js"></script>
  <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="vendor/switchery/switchery.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/login.js"></script>
  <script>
    jQuery(document).ready(function() {
      Main.init();
      Login.init();
    });
  </script>

  <script>
    function userAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status1").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>

</body>

</html>