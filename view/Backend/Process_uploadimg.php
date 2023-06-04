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
    $student_id = ($_POST['student_id']);
    // Handle uploaded files
    $target_dir = "../../imgface/";
    $target_dir1 = "../../certificate/";
    $target_dir2 = "../../atk/";
    $dayget_in = ($_POST['dayget_in']);
    // Handle img_face files
    $img_face = array();
    if (is_array($_FILES['img_face']['name'])) {
        $total_files = count($_FILES['img_face']['name']);

        for ($i = 0; $i < $total_files; $i++) {
            $tmp_file = $_FILES['img_face']['tmp_name'][$i];
            $file_name = $_FILES['img_face']['name'][$i];
            $file_path = $target_dir . $file_name;

            if (move_uploaded_file($tmp_file, $file_path)) {
                $img_face[] = file_get_contents($file_path);
            } else {
                echo "Error uploading image face.";
                exit();
            }
        }
    } else {
        echo "No files uploaded.";
        exit();
    }

    // Convert the image data to base64 encoding
    $img_face_base64 = array();
    foreach ($img_face as $image) {
        $img_face_base64[] = base64_encode($image);
    }


    if (isset($_FILES["certificate"]) && $_FILES["certificate"]["error"] == 0) {
        $certificate = $target_dir1 . basename($_FILES["certificate"]["name"]);
    } else {
        echo "Error uploading certificate.";
        exit();
    }

    if (isset($_FILES["atk"]) && $_FILES["atk"]["error"] == 0) {
        $atk = $target_dir2 . basename($_FILES["atk"]["name"]);
    } else {
        echo "Error uploading ATK.";
        exit();
    }

    // Save uploaded files to server
    if (
        count($img_face) > 0 &&
        move_uploaded_file($_FILES["certificate"]["tmp_name"], $certificate) && move_uploaded_file($_FILES["atk"]["tmp_name"], $atk)
    ) {
        // Insert record into database
        $sql = "UPDATE register_in SET 
    student_id = '$student_id', 
    img_face = '" . implode(",", $img_face_base64) . "', 
    certificate = '$certificate', 
    atk = '$atk',
    date_in = NOW(),
    status_regis = 'ตรวจสอบ',
    dayget_in = '$dayget_in'
    WHERE student_id = $student_id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'คุณอัปโหลดเสร็จสิ้น',
                        icon: 'success',
                        timer: 5000,
                    }).then((result) => {
                        // Go to login page
                        window.location.href = '../Frontend/student/checkstatus.php';
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

// Close database connection
//mysqli_close($conn);
?>