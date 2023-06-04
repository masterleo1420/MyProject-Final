<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    // ระบบไม่พบการเข้าสู่ระบบของนักเรียน
    // ดำเนินการตามที่คุณต้องการ
} else {
    $student_id = $_SESSION['student_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sqlfacedata";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $password = md5($_POST['password']);
        $ConfirmPW = md5($_POST['ConfirmPW']);

        if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'รหัสผ่านต้องประกอบด้วยตัวอักษร a-z และตัวเลขเท่านั้น',
                        icon: 'error',
                        timer: 5000,
                        showConfirmButton: true,
                    }).then((result) => {
                        // Go back to form
                        setTimeout(function() {
                            window.history.back();
                        }, 500);
                    });
                });
            </script>";
        } else if (strlen($_POST['password']) < 8) {
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
                });
            </script>";
        } else if ($password != $ConfirmPW) {
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
                });
            </script>";
        } else {
            $query = "SELECT student_id FROM students WHERE student_id = '$student_id'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                // เกิดข้อผิดพลาดในการสืบค้นฐานข้อมูล
                // ดำเนินการตามที่คุณต้องการ
            } else {
                $sql = "UPDATE students SET 
                    password = '$password'
                    WHERE student_id = '$student_id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'ยินดีด้วย',
                                text: 'รีเซ็ตรหัสผ่านเรียบร้อย',
                                icon: 'success',
                                timer: 5000,
                            }).then((result) => {
                                // Go to login page
                                window.location.href = '../Frontend/student/account.php';
                            });
                        });
                    </script>";
                } else {
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'Error',
                                text: 'ผิดพลาด กรุณาลองใหม่อีกครั้ง',
                                icon: 'error',
                                timer: 5000,
                                showConfirmButton: true,
                            }).then((result) => {
                                // Go back to form
                                setTimeout(function() {
                                    window.history.back();
                                    window.history.back();
                        }, 500);
                    });
                });
            </script>";
                }
            }
        }
    }
}
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>