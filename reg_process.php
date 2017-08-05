<?php

$conn=mysqli_connect("localhost","root","mango");
mysqli_select_db($conn,"mango");


$sql="INSERT INTO device (name, signal)VALUES('".$_POST['name']."','".$_POST['signal']."',now())";


$result = mysqli_query($conn, $sql);
header('Location: http://mango.vos.io:81/index.php');
  ?>
