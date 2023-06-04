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
    
    // Handle uploaded files
    $student_id =($_POST['student_id']);
    
    $comment =($_POST['comment']);
    // Save uploaded files to server
    
        // Insert record into database
        $sql = "UPDATE register_in SET
        student_id = '$student_id',  
        status_regis = 'ไม่อนุญาต',
        img_face = null,
        certificate = null,
        atk = null,
        comment = '$comment'
        WHERE student_id = $student_id";


        if (mysqli_query($conn, $sql)) {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'ดำเนินการเสร็จสิ้น',
                        icon: 'success',
                        timer: 5000,
                    }).then((result) => {
                        // Go to login page
                        window.location.href = '../Frontend/admin/home.php';
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


    


           
        
    


// Close database connection
//mysqli_close($conn);
?>