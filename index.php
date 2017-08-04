<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"mango");
$result = mysqli_query($conn, "SELECT * FROM topic");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/style.css">

  </head>
  <body>
    <header>
      <h1>Mango block</h1>
    </header>

    <nav>
      <ul>
        <?php
          <li><a href="http://localhost/index.php?id=1">등록</a></li>
          <li>내 장치</li>
          while($row=mysqli_fetch_assoc($result))
          {
            echo '<li><a href="http://localhost/index.php?num='.$row['num'].'>"'.$row['name'].'</a></li>';
          }
          <li><a href="http://localhost/index.php?id=2">설정</a></li>
        ?>
      </ul>
    </nav>

    <!--id : 메뉴 ,num : 기기넘버-->

    <article>
      <?php
      if($_GET['id']=='1'))
      {
        //등록 메뉴
      }

      else if($_GET['id']=='2')
      {
        //설정 메뉴
      }

      else
      {
        //기본화면 : 설명글 넣을 예정
      }

      if(empty($_GET['num']===false))
      {
        $sql='SELECT * FROM topic WHERE id='.$_GET['id'];
	      $result=mysqli_query($conn,$sql);
	      $row=mysqli_fetch_assoc($result);
        echo '<h2>'.$row['name'].'</h2>';
        echo '<a href="http://localhost/process.php?state=on"><input type="button" value="on"></a>';
        echo '<a href="http://localhost/process.php?state=off"><input type="button" value="off"></a>';
      }
       ?>
    </article>
  </body>
</html>
