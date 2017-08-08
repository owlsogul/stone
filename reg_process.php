<?php

$conn=mysqli_connect("localhost","root","mango");
mysqli_select_db($conn,"mango");

$sql = "INSERT INTO `mango`.`device` (`id`, `name`, `description`, `created`, `status`) VALUES (NULL,'".$_POST['name']."','".$_POST['description']."',now(), NULL);";

$result = mysqli_query($conn, $sql);

header('Location: index.php');

?>
