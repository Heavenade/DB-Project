<!-- 회원정보를 출력하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> TEST홈페이지 </title>
  </head>
  <body>


    <?
    include "../lib/db_connect.php";
    $connect = dbconn();
    $member = member();
    ?>

    <a href = "../index.php">[홈]</a> <br> <br>

    <h3>회원정보</h3><br>


    <?
    if ($member[user_id])
    {
      echo "Id : ".$member[user_id]; ?><br><?
      echo "Name : ".$member[name];  ?><br><?
      echo "Birth : ".$member[birth];  ?><br><?
      echo "Email : ".$member[email];  ?><br><?
    }
    else{?>
      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>
    <?}?>

    <br> <br>

    <form action='./memberout.php' method = 'post'>
      <input type="hidden" name ="user_id" value = "<? echo $member[user_id]?>" >
      <input type='submit' value = '회원탈퇴'>
    </form>

  </body>
</html>
