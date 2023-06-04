<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Set database connection variables




$servername="localhost";
$username="root";
$password="";
$dbname="sqlfacedata";
$conn=mysqli_connect($servername,$username,"$password","$dbname");

//echo $sql;



//echo $sql;

if (isset($_POST['submit'])) {


    $student_id =($_POST['student_id']);
    $phone = $_POST['Phone'];
    $password = md5($_POST['password']);
    $ConfirmPW = md5($_POST['ConfirmPW']);



    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');


    //ฟังก์ชั่นวันที่
            date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd");	
    //ฟังก์ชั่นสุ่มตัวเลข
             $numrand = (mt_rand());
    //เพิ่มไฟล์
    $upload=$_FILES['Student_card'];
    if($upload !='') 
        {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป 
                $path="../../fileupload/";  
    
            //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
                $type = strrchr($_FILES['Student_card']['name'],".");
                
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
                $newname = $date.$numrand.$type;
                $path_copy=$path.$newname;
                $path_link="../../fileupload/".$newname;
    
                move_uploaded_file($_FILES['Student_card']['tmp_name'],$path_copy); 
         }

    
    // Check if password and confirm password match
    if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
        // Invalid password format
        echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error',
                    text: 'รหัสผ่านต้องประกอบด้วยตัวอักษร a-z หรือ ตัวเลขเท่านั้น',
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go back to form
                    setTimeout(function() {
                        window.history.back();
                    }, 500);
                });
            })
        </script>";
    } else if (strlen($_POST['password']) < 8) {
        // Invalid password length
        echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error',
                    text: 'รหัสผ่านต้องมีอย่างน้อย 8 ตัว',
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go back to form
                    setTimeout(function() {
                        window.history.back();
                    }, 500);
                });
            })
        </script>";
    } else if ($password != $ConfirmPW) {
        // Invalid confirm password
        echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error',
                    text: 'รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง',
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go back to form
                    setTimeout(function() {
                        window.history.back();
                    }, 500);
                });
            })
        </script>";
    
      
    } else {
        // Valid confirm password
        // Check if username and email already exist in database
        $query = "SELECT student_id FROM students WHERE student_id = '$student_id'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            // Duplicate username or email
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ขออภัย',
                        text: 'Student ID ซ้ำ กรุณกรอกใหม่อีกครั้ง',
                        icon: 'warning',
                        timer: 5000,
                        showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
    } else if (!preg_match("/^[0-9]{13}$/", $student_id)) {
        // Invalid student ID format
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'รหัสนักศึกษาต้องเป็นตัวเลข 13 หลัก',
                        icon: 'error',
                        timer: 5000,
                        showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
        } else {
            
            if (!preg_match('/^[0-9]{10}$/', $phone)) {
    // Invalid phone number
    echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error',
                    text: 'เบอร์โทรศัพท์ไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง',
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go back to form
                    setTimeout(function() {
                    window.history.back();
                }, 500);
            });
        })
    </script>";
    exit;
}

            // Perform form submission or other actions here
            // Insert data into database
            $insert_query = "insert into students 
            (
                id,
                student_id,
                name,
                Lname,
                branch,
                Phone,
                password,
                Student_card,
                status
                
            ) 
    values (
                '',
                '".$_POST['student_id']."',
                '".$_POST['name']."',
                '".$_POST['Lname']."',
                '".$_POST['branch']."',
                '".$_POST['Phone']."',
                '".$password."',
                '".$path_link."',                       
                '".$_POST['status']."'
                
            )" ;


            $insert_query2 = "insert into register_in 
            (
                id,
                student_id

                
            ) 
    values (
                '',
                '".$_POST['student_id']."'

                
            )" ;
            $query = mysqli_query($conn, $insert_query2);

            if (mysqli_query($conn, $insert_query) === TRUE) {
                echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'สมัครสมาชิกสำเร็จ',
                        text: 'คุณสามารถ Login ด้วยชื่อผู้ใช้นี้ได้',
                        icon: 'success',
                        timer: 5000,
                    }).then((result) => {
                        // Go to login page
                        window.location.href = '../../login.php';
                    });
                })
            </script>";
            } else {
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'สมัครสมาชิกไม่สำเร็จ กรุณาลองใหม่อีกครั้ง',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
            }
        }
    }
}

// Close database connection
//mysqli_close($conn);
?>