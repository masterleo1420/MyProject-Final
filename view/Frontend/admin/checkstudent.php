<?php
session_start();
if ($_SESSION['status'] != 'admin') {  //check session

  Header("Location:../../../login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {


  include("../../../func.php");

  $student_id = $_GET['student_id'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sqlfacedata";
  $sql = "SELECT DISTINCT a.student_id, b.name ,b.Lname ,b.branch, b.Phone, b.Student_card, a.date_in, a.img_face ,a.certificate ,a.atk FROM register_in a ,students b 
 WHERE  a.student_id = b.student_id 
 AND a.student_id = $student_id";

  $conn = mysqli_connect($servername, $username, "$password", "$dbname");
  $student = mysqli_query($conn, $sql);


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
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../dist/css/adminlt.css">
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
        <a href="home.php" class="brand-link">
          <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
        </a>
        <?php echo getMainMenu('2'); ?>


      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"><br>
        <!-- Content Header (Page header) -->


        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <H2><i class="fas fa-user"></i>&nbsp;<?php echo $student_id; ?></H2>
                    <div class="row row-space">
                      <div class="col-2">
                      </div>
                      <?php while ($row = mysqli_fetch_array($student)) { ?>
                        <div class="col-4">
                          <div class="input-group">
                            <label class="label">ชื่อ</label>
                          </div>
                          <div class="input-group">
                            <span class="brand-text"><?php echo $row['name']; ?></span>
                            &nbsp;<span class="brand-text"><?php echo $row['Lname']; ?></span>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="input-group">
                            <label class="label">เบอร์โทรศัพท์</label>
                          </div>
                          <div class="input-group">
                            <span class="brand-text"><?php echo $row['Phone']; ?></span>
                          </div>
                        </div>
                    </div> <br>
                    <div class="row row-space">
                      <div class="col-2">
                      </div>

                      <div class="col-3">
                        <div class="input-group">
                          <label class="label">สาขา</label>
                        </div>
                        <div class="input-group">
                          <span class="brand-text"><?php echo $row['branch']; ?></span>
                        </div>
                      </div>
                    </div><br>
                    <div class="row row-space">
                      <div class="col-2">
                      </div>
                      <div class="col-3">

                        <div class="input-group">
                          <label class="label">รูปบัตรนักศึกษา</label>
                        </div>
                        <div class="input-group">
                        <a href="../<?php echo $row['Student_card']; ?>"><img src="../<?php echo $row['Student_card']; ?>" width="60%" height="100%"></a>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <label class="label">รูปใบหน้านักศึกษา</label>
                        </div>
                        <div class="input-group">
                        <?php
                                              $imageData = $row['img_face'];

                                              if (!empty($imageData)) {
                                                $imageType = 'image/jpeg';  // ปรับเป็นชนิดของรูปภาพที่เก็บในฐานข้อมูล
                                                $imageList = explode(',', $imageData);

                                                foreach ($imageList as $image) {
                                                  $base64Image = base64_decode($image);
                                                  $imageSrc = "data:$imageType;base64,$image";
                                                  echo '<a href="' . $imageSrc . '"><img src="' . $imageSrc . '" alt="รูปภาพนักศึกษา" width="50%" height="100%"></a>';
                                                }
                                              } else {
                                                echo 'ไม่มีรูปภาพ';
                                              }
                            ?>
                        </div>
                      </div>
                    </div><br>
                    <div class="row row-space">
                      <div class="col-2">
                      </div>
                      <div class="col-3">

                        <div class="input-group">
                          <label class="label">ประวัติการฉีดวัคซีน</label>
                        </div>
                        <div class="input-group">
                        <a href="../<?php echo $row['certificate']; ?>"><img src="../<?php echo $row['certificate']; ?>" width="60%" height="100%"></a>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <label class="label">ผลตรวจ ATK</label>
                        </div>
                        <div class="input-group">
                        <a href="../<?php echo $row['atk']; ?>"><img src="../<?php echo $row['atk']; ?>" width="60%" height="100%"></a>
                        </div>
                      </div>
                    </div>
                    <div class="row row-space">
                      <div class="col-11">
                      <a href="allow.php?student_id=<?php echo $row['student_id']; ?>" type="submit" class="btn btn-success float-right">&nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;</a>
                       
                      </div>
                        <div class="col-1">
                        <a href="not_allowed.php?student_id=<?php echo $row['student_id']; ?>" type="submit" class="btn btn-primary float-right">ไม่อนุมัติ</a>
                      </div>
                    </div>
                  <?php } ?>
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
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <script>
      $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
              label: 'Digital Goods',
              backgroundColor: 'rgba(60,141,188,0.9)',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
              label: 'Electronics',
              backgroundColor: 'rgba(210, 214, 222, 1)',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [65, 59, 80, 81, 56, 55, 40]
            },
          ]
        }

        var areaChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines: {
                display: false,
              }
            }],
            yAxes: [{
              gridLines: {
                display: false,
              }
            }]
          }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
          type: 'line',
          data: areaChartData,
          options: areaChartOptions
        })

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
          type: 'line',
          data: lineChartData,
          options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
          labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
          ],
          datasets: [{
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }]
        }
        var donutOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            xAxes: [{
              stacked: true,
            }],
            yAxes: [{
              stacked: true
            }]
          }
        }

        new Chart(stackedBarChartCanvas, {
          type: 'bar',
          data: stackedBarChartData,
          options: stackedBarChartOptions
        })
      })
    </script>
  </body>
<?php } ?>

  </html>