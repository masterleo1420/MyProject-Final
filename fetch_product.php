<?php 

 $servername="localhost";
 $username="root";
 $password="";
 $dbname="falcotest";
 $conn=mysqli_connect($servername,$username,"$password","$dbname");
 $sql= "SELECT * FROM product where prod_id ='".$_POST['id']."'" or die("ERROR : ".$mysqli->error);
 $query = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>
