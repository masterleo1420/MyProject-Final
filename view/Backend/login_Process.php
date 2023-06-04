<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require_once 'connect.php';
if (isset($_POST['student_id'])) {
  //connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sqlfacedata";
  $con = mysqli_connect($servername, $username, "$password", "$dbname");

  //รับค่า user & password
  $student_id = $_POST["student_id"];
  $password = $_POST["password"];



  $sql = "SELECT * FROM students WHERE student_id='" . $student_id . "' and Password = '" . hash('md5', $_POST['password']) . "'
     LIMIT 1 ";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    $_SESSION["student_id"] = $row["student_id"];
    $_SESSION["students"] = $row["name"] . " " . $row["Lname"];
    $_SESSION["Phone"] = $row["Phone"];
    $_SESSION["branch"] = $row["branch"];
    $_SESSION["Student_card"] = $row["Student_card"];
    $_SESSION["status"] = $row["status"];



    if ($_SESSION["status"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า home.php



      echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'เข้าสู่ระบบสำเร็จ',
                        icon: 'success',
                        timer: 3000,
                    }).then((result) => {
                       
                        window.location.href = '../Frontend/admin/home.php';
                    });
                })
            </script>";
    } else if ($_SESSION["status"] == "student") {  //ถ้าเป็น student ให้กระโดดไปหน้า dashborad.php


      echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'เข้าสู่ระบบสำเร็จ',
                        icon: 'success',
                        timer: 3000,
                    }).then((result) => {
                       
                        window.location.href = '../Frontend/student/dashborad.php';
                    });
                })
            </script>";
    } else {
      echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error',
                    text: 'Username หรือ  Password ไม่ถูกต้อง',
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
  } else {
    echo "<script>
      $(document).ready(function() {
          Swal.fire({
              title: 'Error',
              text: 'Username หรือ  Password ไม่ถูกต้อง',
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
} else {
  Header("Location:../login.php"); //user & password incorrect back to login again
}

?>