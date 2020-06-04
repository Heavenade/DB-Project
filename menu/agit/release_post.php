<!-- 크리쳐 방출에 대한 데이터를 입력하고 수행하는 페이지 -->

<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> release </title>
  </head>
  <body>


    <? header("content-type:text/html; charset=UTF-8");

    include ("../../lib/db_connect.php");
    $connect = dbconn();
    $member = member();

    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님의 히스토리";
    }
    else {?>

      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>
    <?}?>

    <a href = "../index.php">[홈]</a> <br> <br>

    <?
    //크리쳐 방출 : 데이터베이스에서 삭제
    $query = "delete from creature_owned where user_id = '$member[user_id]' and no = $_POST[no]";
    mysqli_query($connect,"set names utf8");
    mysqli_query($connect,$query);
    ?>

    <script>
    window.alert('방출 되었습니다.');
    location.href='../agit.php';
    </script>

  </body>
  </html>
