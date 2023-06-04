<?php
session_start();

//ทำลาย session ทิ้ง
unset($_SESSION['student_id']);
unset($_SESSION['name']);
unset($_SESSION['Lname']);
unset($_SESSION['status']);
//สิ้นสุดการทำลาย

header('location:../../login.php')
?>