<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> TEST홈페이지 </title>
  </head>
  <body>
    <a href = "./member/join.php">[회원가입]</a> &nbsp; &nbsp;
    <a href = "./member/login.php">[로그인]</a> &nbsp; &nbsp;

    <form action='./test2.php' name='test' method = 'post'>
      <input type = 'hidden' name ='id' value = 'test'>
      <li> 아이디 : <input type = 'text' name = 'user_id' size ='10'>
      <li> 이름 : <input type = 'text' name = 'name' size ='10'>
      <li> 비밀번호 : <input type = 'password' name = 'pw' size ='10'>
      <input type='submit' value='전송'>
    </form>

    <?
    include ("./lib/db_connect.php");
    $connect = dbconn();

    //쿼리문으로 데이터를 불러오기
    $query = "select * from member where id = 'test'";

    $result = mysqli_query($connect, $query);
    while ($data = mysqli_fetch_array($result))
    {?>

        <td width='100%' height = '30' align='left' valign= 'top'>
          -이름: <?=$data[name]?> &nbsp; &nbsp;
          -아이디: <?=$data[user_id]?>
        </td>
    <?}?>


  </body>
</html>
