<!-- 로그인을 위한 정보를 받는 페이지 -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title> 로그인 페이지 </title>
</head>

<body>
  <table border = '0' width='600' height = '100%' align='center' cellspacing='0' cellpadding ='0' bgcolor ='#EEEEEE'>
    <tr>
      <td width ='100%' height ='80' align='center'>
        <a href = "../../index.php">[홈]</a> <br><br>

        =로그인=
      </td>
    <tr>
      <form action='./login_post.php' name='login' method = 'post'>

        <td width ='100%' height ='200' align='left'>
          <li> 아이디 &nbsp; : <input type = 'text' name = 'user_id' size = '10'>
            <br>
          <li> 비밀번호 :  <input type = 'password' name = 'pw' size = '15'>
        </td>

    <tr>
      <td width ='100%' height ='30' align='center'>
        <input type='submit' value = '전송'>
      </td>
    </form>

    <tr>
      <td width ='100%' height ='100%' align='center'> &nbsp; </td>
    </tr>
    <table>

</body>
</html>
