<?php

$conn=mysqli_connect("mango.vos.io","root","mango");
mysqli_select_db($conn,"mango");


$sql="INSERT INTO device (name, signal)VALUES('".$_POST['name']."','".$_POST['signal']."',now())";


$result = mysqli_query($conn, $sql);
header('Location: http://mago.vos.io:81/index.php');
  ?>
