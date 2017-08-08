<?php
$conn = mysqli_connect("localhost","root","mango");
mysqli_select_db($conn,"mango");
$result = mysqli_query($conn, "SELECT * FROM device");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Mango Block</title>
  </head>
  <body>

    <header>
      <h1><a href = "/">Mango block</a></h1>
    </header>

    <nav>
      <ul id="menubar">
        <?php
          echo '<li><a href="index.php?setting=true">기기관리</a></li>';
          echo '<li>내 장치</li>';
          while($row=mysqli_fetch_assoc($result))
          {
            echo '<li><a href="index.php?id='.$row['id'].'">'.$row['name'].'</a></li>';
          }
          echo '<li><a href="setting.php">설정</a></li>';
        ?>
      </ul>
    </nav>

    <!--id : 메뉴 ,num : 기기넘버-->

    <article>
      <?php
        if(empty($_GET['id'])===false)
        {
          $sql='select * from device where id='.$_GET['id'];
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);

          echo '<h2>'.$row['name'].'</h2>';
          echo '<a href="process.php?state=on"><input type="button" value="on"></a>';
          echo '<a href="process.php?state=off"><input type="button" value="off"></a>';
        }

      if(empty($_GET['setting'])===false){ // 기기 관리 페이지를 눌렀을 때
    		$sql='SELECT * FROM device';
    		$result=mysqli_query($conn,$sql);
        echo '<form id="device_manage_signal_form" action="bring_device_signal.php" method="post">';
        echo '<input type="submit" name ="bringDeviceSignal" value="신호가져오기"/>';
        echo '</form>';


        echo '<h2>연결된 기기 목록</h2>';

        echo '<h4>새로운 기기 목록</h4>';
        echo '로딩중...';

    		// 현재 기기출력 및 수정
        // 이미 저장 되어 있는 기기일 경우
        echo '<h4>저장된 기기 목록</h4>';
        while($row=mysqli_fetch_assoc($result)){
          echo '<form id="device_manage_info" class="" action="update_process.php" method="post">';
          echo  '기기id   : '.$row['id'].'<br>';
          echo  '기기이름 : <input type="text" name="name" value="'.$row['name'].'"><br>';
          echo  '기기정보 : <input type="text" name="description" value="'.$row['description'].'"><br>';
          echo  '기기상태 : ';
          echo   $row['status']==1 ? 'On' : 'Off';
          echo  '<br>추가시간 : '.$row['created'];
          echo  '<br><input type="submit" name="submit" value="변경">';
          echo '</form>';
        }


  		//기기 추가
      echo '<form class="" action="reg_process.php" method="post">';
      echo  '<h2>기기추가</h2>';
      echo  '기기이름 : <input type="text" name="name" value="'.$row['name'].'">';
      echo  '정보 : <input type="text" name="description" value="'.$row['description'].'">';
      echo  '<input type="submit" name="submit" value="추가">';
      echo '</form>';
  	}

    ?>
    </article>
  </body>
</html>
