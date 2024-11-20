<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị viên | Tìm kiếm thông tin bệnh nhân</title>

  <link
    href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
    rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
  <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php');?>
    <div class="app-content">
      <?php include('include/header.php');?>
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="mainTitle">Quản trị viên | Tìm kiếm thông tin bệnh nhân</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Quản trị viên</span>
                </li>
                <li class="active">
                  <span>Tìm kiếm thông tin bệnh nhân</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <div class="col-md-12">
                <form role="form" method="post" name="search">

                  <div class="form-group">
                    <label for="doctorname">
                      Tìm kiếm theo Tên / Số điện thoại di động
                    </label>
                    <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
                  </div>

                  <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                    Tìm kiếm
                  </button>
                </form>
                <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
                <h4 align="center">Kết quả tìm kiếm từ khóa "<?php echo $sdata;?>" </h4>
                <table class="table table-hover" id="sample-table-1">
                  <thead>
                    <tr>
                      <th class="center">#</th>
                      <th>
                        Tên bệnh nhân</th>
                      <th>
                        Số điện thoại</th>
                      <th>Giới tính </th>
                      <th>Ngày tạo </th>
                      <th>Ngày cập nhật</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

$sql=mysqli_query($con,"select * from tblpatient where PatientName like '%$sdata%'|| PatientContno like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                    <tr>
                      <td class="center"><?php echo $cnt;?>.</td>
                      <td class="hidden-xs"><?php echo $row['PatientName'];?></td>
                      <td><?php echo $row['PatientContno'];?></td>
                      <td><?php echo $row['PatientGender'];?></td>
                      <td><?php echo $row['CreationDate'];?></td>
                      <td><?php echo $row['UpdationDate'];?>
                      </td>
                      <td>


                        <a href="view-patient.php?viewid=<?php echo $row['ID'];?>" class="btn btn-primary btn-xs"
                          target="_blank">Xem</a>

                      </td>
                    </tr>
                    <?php 
$cnt=$cnt+1;
} } else { ?>
                    <tr>
                      <td colspan="8">Không tìm thấy bản ghi nào đối với tìm kiếm này</td>

                    </tr>

                    <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php include('include/footer.php');?>
  <?php include('include/setting.php');?>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/modernizr/modernizr.js"></script>
  <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="vendor/switchery/switchery.min.js"></script>
  <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
  <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
  <script src="vendor/autosize/autosize.min.js"></script>
  <script src="vendor/selectFx/classie.js"></script>
  <script src="vendor/selectFx/selectFx.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/form-elements.js"></script>
  <script>
  jQuery(document).ready(function() {
    Main.init();
    FormElements.init();
  });
  </script>
</body>

</html>
<?php } ?>