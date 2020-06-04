<!-- 탐험 메뉴를 출력하는 페이지 -->

<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> explore </title>
  </head>
  <body>

    <? header("content-type:text/html; charset=UTF-8");

    include ("../lib/db_connect.php");
    $connect = dbconn();
    $member = member();

    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님의 탐험";
    }
    else {?>

      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>

    <?}?>
    <a href = "../index.php">[홈]</a> <br><br>

    <center>
    <h4>탐험을 떠날 장소를 선택하세요.</h4><br>
    <a href = "explore/forest.php"> <img src = "../image/exploreimage/forest.jpg"  width="200" height="150" ></a>
    <a href = "explore/waterside.php"><img src = "../image/exploreimage/waterside.jpg"  width="200" height="150" ></a>
    <a href = "explore/cave.php"><img src = "../image/exploreimage/cave.jpg"  width="200" height="150"></a>
    </center>

  </body>
</html>
