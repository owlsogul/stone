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

  </head>
  <body>
    <header>
      <h1><a href = "/">Mango block</a></h1>
    </header>

    <nav>
      <ul>
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

      if(empty($_GET['setting'])===false){
		$sql='SELECT * FROM device';
		$result=mysqli_query($conn,$sql);
        // echo '<input type="submit" name ="bringDeviceSignal" value="신호가져오기"/>';
		// 현재 기기출력 및 수정
    while($row=mysqli_fetch_assoc($result)){
      echo '<form class="" action="update_process.php" method="post">';
      echo  '기기id : '.$row['id'].'<br>';
      echo  '기기이름 : <input type="text" name="name" value="'.$row['name'].'">';
      echo  '정보 : <input type="text" name="description" value="'.$row['description'].'">';
      echo  '상태 : ';
      echo   $row['status']==1 ? 'On' : 'Off';
      echo  '추가시간 : '.$row['created'];
      echo  '<input type="submit" name="submit" value="변경">';
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
