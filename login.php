<?php 
        //เริ่มการทำงาน SESSION
        session_start() ;
        
        //ทำลาย session ทิ้ง
        unset($_SESSION['student_id']);
        unset($_SESSION['name']);
        unset($_SESSION['Lname']);
        unset($_SESSION['status']);
        //สิ้นสุดการทำลาย

        //คำสั่งตรวจสอบค่า Error 
        $msg = NULL ;
        if( isset($_SESSION['err']) )
        {
            $msg = $_SESSION['err'] ;
            unset($_SESSION['err']); // ทำลายข้อมูลใน session Error
        }
            
        //หยุดการทำงาน SESSION
        session_write_close();
?>
<!doctype html>
<html lang="en">

  <head>
  <link rel="icon" type="image/png" href="../../assets/images/favicon2.png">
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/logre/css/style1.css">


	<style>
        .pointer {cursor: pointer;}
        </style>

	</head>
    <style>
        body {
          background-image: url(../../assets/logre/images/bglog.png);

        }
        </style>
	<body style="background-color:#e4dbd4;">
		
    
    
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
                
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>ยินดีต้อนรับ</h2>
								<p>หากคุณยังไม่ได้ลงทะเบียน?</p>
								<a href="register.php" class="btn btn-white btn-outline-white">สมัครสมาชิก</a>
							</div>
			            </div>
                        
					<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">

			      		<div class="w-100">  
			      			<h3 class="mb-4">ลงชื่อเข้าใช้งาน </h3>
			      		</div>
							<div class="w-100">
								<p class="social-media d-flex justify-content-end">
									<a href="" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
									<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
								</p>
							</div>
			      	    </div>
                    <?php
                        if ($msg != NULL)
                        { ?>
                            <a style="color:red;"> <?php echo $msg ?> </a> 
                    <?php } ?>
					<form action="view/Backend/login_Process.php" class="signin-form" method="POST">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" name="student_id" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit"  class="form-control btn btn-primary submit px-3">เข้าสู่ระบบ</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">จดจำบัญชีนี้
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
										
									</div>

		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>

	</body>
</html>

