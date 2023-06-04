<?php
        session_start() ;

        //ทำลาย session ทิ้ง
        unset($_SESSION['student_id']);
        unset($_SESSION['name']);
        unset($_SESSION['Lname']);
        unset($_SESSION['status']);
        //สิ้นสุดการทำลาย
        
    ?>
<!DOCTYPE html>
<html lang="en">

<head>



    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    


    <!-- Title Page-->
    <link rel="icon" type="image/png" href="../../assets/images/favicon2.png">
    <title>Register</title>

    <!-- Icons font CSS-->
   <!-- Icons font CSS-->
   <link href="recss/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="recss/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <!-- Main CSS-->
    



    <!-- Font special for pages-->
    

    <!-- Vendor CSS-->
    <link href="recss/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="recss/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="recss/css/main.css" rel="stylesheet" media="all">

    
   
</head>

<body style="background-color:#e4dbd4;">
   
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    
                    <h2 class="title">สมัครสมาชิก</h2>
                    <form name= "regis" action="view/Backend/Process_register.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
                    <?php
                    ?>
                    <div class="row row-space">
                    <div class="col-2">
                                <div class="input-group">
                                    <label class="label">รหัสนักศึกษา</label>
                                    <input class="input--style-4" type="text" name="student_id" id="student_id" required>
                                </div>
                            </div>
                    </div>        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">ชื่อ</label>
                                    <input class="input--style-4" type="text" name="name" id="name" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">นามสกุล</label>
                                    <input class="input--style-4" type="text" name="Lname" id="Lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">สาขา</label>
                                    
                                    <div class="rs-select2 js-select-simple">
                                <select name="branch">
                                    <option disabled="disabled" selected="selected">เลือกสาขา</option>
                                    <option>คณิตศาสตร์</option>
                                    <option>สถิติประยุกต์</option>
                                    <option>วิทยาการคอมพิวเตอร์</option>
                                    <option>เทคโนโลยีคอมพิวเตอร์</option>
                                    <option>วิชาการวิเคราะห์และจัดการข้อมูลขนาดใหญ่</option>
                                    <option>ชีววิทยา</option>
                                    <option>ฟิสิกส์</option>
                                    <option>วิทยาศาสตร์และการจัดการเทคโนโลยีอาหาร</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>  
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">เบอร์โทรศัพท์</label>
                                    <input class="input--style-4" type="text" name="Phone" id="Phone" required>
                                </div>

                            </div>
                  
                        </div>
                        <div class="row row-space">
                            

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">รหัสผ่าน</label>
                                    <input class="input--style-4" type="password" name="password" id="password" required>
                                </div>
                            </div>
                        
                        <div class="col-2">
                                <div class="input-group">
                                <label class="label">ยืนยันรหัสผ่าน</label>
                                    <input class="input--style-4" type="password" name="ConfirmPW" id="ConfirmPW" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            

                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">รูปบัตรนักศึกษา</label>
                            <div class="custom-file">
                            <input type="file" class="input--style-4" id="customFile" name="Student_card" required accept="image/*">
                  
                            </div>
                            </div>
                    </div>
                        
                        
                        </div>
                        <select hidden id="inputStatus" class="form-control custom-select" name="status" >
                        <option value="student" selected>student</option>
                    </select>
                           
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" style="background-color: #392718;" name="submit" type="submit">ยืนยัน</button>
                            <a href="login.php" class="btn btn--radius-2 btn--blue" style="background-color: #e9a66c;" >ยกเลิก</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS-->
    <script src="recss/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="recss/vendor/select2/select2.min.js"></script>
    <script src="recss/vendor/datepicker/moment.min.js"></script>
    <script src="recss/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="recss/js/global.js"></script>

    <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



    <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->