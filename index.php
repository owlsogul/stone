<?php
$conn = mysqli_connect("localhost","root","mango");
mysqli_select_db($conn,"mango");
$result = mysqli_query($conn, "SELECT * FROM device");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://mango.vos.io:81/style.css">

  </head>
  <body>
    <header>
      <h1>Mango block</h1>
    </header>

    <nav>
      <ul>
        <?php
          echo '<li><a href="http://mango.vos.io:81/registration.php">등록</a></li>';
          echo '<li>내 장치</li>';
          while($row=mysqli_fetch_assoc($result))
          {
            echo '<li><a href="http://mango.vos.io:81/index.php?num='.$row['num'].'">'.$row['name'].'</a></li>';
          }
          echo '<li><a href="http://mango.vos.io:81/setting.php">설정</a></li>';
        ?>
      </ul>
    </nav>

    <!--id : 메뉴 ,num : 기기넘버-->

    <article>
      <?php
      if(empty($_GET['num'])===false)
      {
        $sql='SELECT * FROM device WHERE id='.$_GET['id'];
	      $result=mysqli_query($conn,$sql);
	      $row=mysqli_fetch_assoc($result);
        echo '<h2>'.$row['name'].'</h2>';
        echo '<a href="http://mango.vos.io:81/process.php?state=on"><input type="button" value="on"></a>';
        echo '<a href="http://mango.vos.io:81/process.php?state=off"><input type="button" value="off"></a>';
      }
       ?>
     </nav>
    </article>
  </body>
</html>
