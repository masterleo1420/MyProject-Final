<?php
session_start();
$student_id = $_SESSION['student_id'];


if ($_SESSION['status'] != 'student') { //check session

  Header("Location:../../../login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {

  include("func.php");


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sqlfacedata";
  $conn = mysqli_connect($servername, $username, "$password", "$dbname");
  $sql = "SELECT DISTINCT  a.student_id,a.name ,a.Lname ,a.branch ,a.Phone ,a.Student_card ,b.img_face ,b.certificate ,b.atk FROM students a ,register_in b  WHERE  b.student_id =a.student_id AND b.student_id = $student_id ";
  $student = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($student);
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
    <title>
      <?php echo getTitle(""); ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../dist/css/adminlt.css">

    <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../../icon/logo.png" />
  </head>

  <body class="hold-transition sidebar-mini">
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
        <a href="dashborad.php" class="brand-link">
          <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light" style="display: inline-block; text-align: right;">
            <?php echo $_SESSION['students']; ?><br>
            <?php echo $_SESSION['student_id']; ?>
          </span>
        </a>
        <?php echo getMainMenu('5,52'); ?>


      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"><br>
        <!-- Content Header (Page header) -->


        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <H2>Edit Account </H2>
                    <form name="regis" action="../../Backend/Process_update_password.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">

                      <input hidden class="input--style-4" type="text" name="student_id" id="student_id" value="<?php echo $row['student_id']; ?>" required>

                      <div class="row row-space">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>รหัสผ่านใหม่</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                          </div>
                        </div>
                      </div>

                      <div class="row row-space">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ยืนยันรหัสผ่านใหม่</label>
                            <input type="password" class="form-control" name="ConfirmPW" id="ConfirmPW" required>
                          </div>
                        </div>
                      </div>

                      <div class="row row-space">
                        <div class="col-2">
                          <button type="submit" name="submit" class="btn btn-success float-right">รีเซ็ตรหัสผ่าน</button>
                        </div>
                        <div class="col-2">
                          <a onclick="history.back()" type="submit" class="btn btn-primary float-right">&nbsp;&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                      </div>
                  </div>
                </div>
                </form>

              </div>

            </div>
            <!-- /.card -->

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!-- /.col -->
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
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": [""]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
    <script>
      function addnewlines() {
        text = document.getElementById('inputMainFunction').value;
        text = text.replace(/ /g, "[sp] [sp]");
        text = text.replace(/\n/g, "[nl]");
        document.getElementById('inputMainFunction').value = text;
        return false;
      }
    </script>


  </body>
<?php } ?>

  </html>