<?php

$sql='SELECT * FROM device';
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  echo '<form id="device_manage_info" class="" action="update_process.php" method="post">';
  echo  '기기id   : '.$row['id'].'<br>';
  
  $type = $row['type'];
  $typeName = 'NULL';
  switch ($type){
    case 0:
    break;
    case 1:
    break;
    case 2:
    break;
  }

  echo  '기기종류   : '.$typeName.'<br>';
  echo  '기기이름 : '.$row['name'].'<br>';
  echo  '기기정보 : '.$row['description'].'<br>';
  echo  '기기상태 : ';
  echo   $row['status']==1 ? 'On' : 'Off';
  // 타입에 맞게 기기 상태 메시지도 수정해야함.

  echo  '<br>추가시간 : '.$row['created'];
  echo '</form>';
}

 ?>
