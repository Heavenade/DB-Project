<!-- 수집 메뉴를 출력하는 페이지 -->

<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> gather </title>
  </head>
  <body>

<? header("content-type:text/html; charset=UTF-8");

include ("../lib/db_connect.php");
$connect = dbconn();
$member = member();

if ($member[user_id])
{
  echo $member[name]."(".$member[user_id].")님의 수집";
}
else {?>

  <script>
  window.alert('로그인 후 사용가능합니다.');
  location.href='../index.php';
  </script>
<?}?>
<br>
<a href = "../index.php">[홈]</a>

<!-- 이미지 메뉴 출력 -->
<center>
<h4>아이템을 수집할 장소를 선택하세요.</h4><br>
<a href = "gather/earth.php"> <img src = "../image/gatherimage/earth.jpg"  width="200" height="150" ></a>
<a href = "gather/river.php"><img src = "../image/gatherimage/river.jpg"  width="200" height="150" ></a>
<a href = "gather/sky.php"><img src = "../image/gatherimage/sky.jpg"  width="200" height="150"></a>
</center>

  </body>
</html>
