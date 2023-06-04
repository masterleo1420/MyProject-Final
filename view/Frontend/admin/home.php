<?php
session_start();
if ($_SESSION['status'] !='admin'){  //check session

      Header("Location:../../../login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{



include("../../../func.php");


$servername="localhost";
$username="root";
$password="";
$dbname="sqlfacedata";
$conn=mysqli_connect($servername,$username,"$password","$dbname");

//echo $sql;
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo getTitle(""); ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  
  <link rel="stylesheet" href="../../../dist/css/adminlt.css">
  <link rel="shortcut icon" type="image/x-icon" href="../../../icon/logo.png" />
</head>
<body  class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- pre-load-->
  


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <?php echo getMainMenu('1'); ?>


  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"><br>
    <!-- Content Header (Page header) -->
    

    <section class="content">
    <div class="container-fluid">
    <div class="row">
          
          <!-- /.col -->
         
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

         

          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-right">จำนวนคนเข้าคณะในวันนี้</span>
                <span class="info-box-number text-right">+<?php echo number_format($conn->query("SELECT * FROM tb_camera WHERE DATE(date)=CURRENT_DATE()")->num_rows) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
         
           
            <!-- /.info-box -->
          
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-right">จำนวนคนเข้าคณะในสัปดาห์นี้</span>
                <span class="info-box-number text-right">+<?php echo number_format($conn->query("SELECT * FROM tb_camera WHERE WEEK(date)=WEEK(CURRENT_DATE())")->num_rows) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>






          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-right">จำนวนคนเข้าคณะในเดือนนี้</span>
                <span class="info-box-number text-right">+<?php echo number_format($conn->query("SELECT * FROM tb_camera WHERE MONTH(date)=MONTH(CURRENT_DATE())")->num_rows) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-right">จำนวนคำร้องการเข้าใช้ตึก</span>
                <span class="info-box-number text-right">+<?php echo number_format($conn->query("SELECT * FROM register_in WHERE status_regis = 'ตรวจสอบ'")->num_rows) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

         
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
    </div>
</section>









              
          </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php echo getFooter(); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>

</body>
<?php }?>
</html>
