<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Set database connection variables


session_start();
$student_id = $_SESSION['student_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sqlfacedata";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //echo $sql;



    //echo $sql;

    // ตรวจสอบว่าการเชื่อมต่อฐานข้อมูลสำเร็จหรือไม่


    // รับค่าจากฟอร์ม
    $name = $_POST['name'];
    $Lname = $_POST['Lname'];
    $Phone = $_POST['Phone'];
    $branch = $_POST['branch'];
    $Student_card = $_FILES['Student_card']['name'];

    $target_dir = "../../fileupload/";

    if (isset($_FILES["Student_card"]) && $_FILES["Student_card"]["error"] == 0) {
        $Student_card = $target_dir . basename($_FILES["Student_card"]["name"]);
    } else {
        echo "Error uploading image face.";
        exit();
    }

    if (!preg_match('/^[0-9]{10}$/', $Phone)) {
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

    if (move_uploaded_file($_FILES["Student_card"]["tmp_name"], $Student_card)) {
        $sql = "UPDATE students SET 
            student_id = '$student_id',
            name='$name', 
            Lname='$Lname', 
            Phone='$Phone', 
            branch='$branch', 
            Student_card='$Student_card' 
            WHERE student_id = $student_id";

        // ตรวจสอบว่าอัพเดทข้อมูลสำเร็จหรือไม่
        if (mysqli_query($conn, $sql)) {
            echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'ยินดีด้วย',
                text: 'คุณอัปเดตข้อมูลเสร็จสิ้น',
                icon: 'success',
                timer: 5000,
            }).then((result) => {
                // Go to login page
                window.location.href = '../Frontend/student/account.php';
            });
        })
    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
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
                }, 500);
        });
    })
</script>";
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);

?>