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
$sql= "SELECT DISTINCT a.student_id,a.name ,a.Lname ,a.branch,b.date ,b.time from students a, tb_camera b WHERE b.student_id =a.student_id AND MONTH(date)= MONTH(CURRENT_DATE())" or die("ERROR : ".$mysqli->error);
$rsprd = mysqli_query($conn, $sql);
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
  <title>ประวัติการเข้าคณะ-รายเดือน</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
  <link rel="shortcut icon" type="image/x-icon" href="../../../icon/logo.png" />
</head>
<body class="hold-transition sidebar-mini">
  
<div class="wrapper">

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


    

    <?php echo getMainMenu('5,53'); ?>


  </aside>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>รายเดือน</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><font color="#392718">Dashboard</font></a></li>
              <li class="breadcrumb-item active">รายเดือน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product" class="table table-hover" data-live-search="true">
                
                  <thead>
                 
                  <tr>
                  <th style="width:5%">ลำดับ</th>
                  <th style="width:10%">รหัสนักศึกษา</th>
                  <th style="width:15%">ชื่อ</th>
                  <th style="width:15%">นามสกุล</th>
                  <th style="width:25%">สาขา</th>
                  <th style="width:15%">วันที่</th>
                  <th style="width:25%">เวลาที่เข้า</th>
                  
                    
                    
                  </tr>
                  </thead>              
                  <tbody>
                  <?php $i = 1; while($row = mysqli_fetch_array($rsprd)) { ?> 
                    
                    <tr>
                      
                          <td><p><?php echo $i;?></p></td>
                          <td><p><?php echo $row ['student_id']?></p></td>
                          <td><p><?php echo $row ['name']?></p></td>
                          <td><p><?php echo $row ['Lname']?></p></td>
                          <td><p><?php echo $row ['branch']?></p></td>
                          <td><?php echo $row ['date']?></td>
                          <td><?php echo $row ['time']?></td>
          
                          
                        </tr>
                        <?php $i++; } ?>
                   
                  </tbody>
                  
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php echo getFooter(); ?>
</div>
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<!--<script>
$(function () {
    $("#product").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      
    }).buttons().container().appendTo('#product_wrapper .col-md-6:eq(0)');
  });
</script>-->
<script>
  $(function () {
    $("#product").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel","print", "colvis"]
    }).buttons().container().appendTo('#product_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
<?php }?>
</html>
