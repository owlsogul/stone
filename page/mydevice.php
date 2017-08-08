<?php

$sql='SELECT * FROM device';
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  echo '<form id="device_manage_info" class="" action="update_process.php" method="post">';
  echo  '기기id   : '.$row['id'].'<br>';
  echo  '기기이름 : <input type="text" name="name" value="'.$row['name'].'"><br>';
  echo  '기기정보 : <input type="text" name="description" value="'.$row['description'].'"><br>';
  echo  '기기상태 : ';
  echo   $row['status']==1 ? 'On' : 'Off';
  echo  '<br>추가시간 : '.$row['created'];
  echo '</form>';
}

 ?>
