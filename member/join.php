<!-- 회원가입 페이지 -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>회원가입</title>
</head>

<body>
<TABLE BORDER='0' CELLSPACING='0' WIDTH ='100%' HEIGHT = '100%' ALIGN = 'CENTER' VALIGN='TOP'>
<TR>
<TD WIDTH = '100%' HEIGHT = '150%' ALIGN = 'CENTER' VALIGN='TOP'>
&nbsp; &nbsp; <a href = '../index.php'><strong>[홈]</strong></a>
</TD>

<TD WIDTH = '100%' HEIGHT = '100%' ALIGN = 'CENTER' VALIGN='TOP'>
<table border ='0' width='750' height = '100%' bgcolor = 'FFFFFF' align='center' cellspacing = '0' cellpadding = '0'>

      <form action = './join_post.php' name = 'member' method = 'post'>
      <td height = '30' colspan=2 bgcolor = 'ffffff' align=center>
          <strong>[ 회 원 가 입 ]</strong>

          <li>회원아이디 : <input type = 'text' name='user_id' size = '10'>
          <li>이름: <input type='text' name='name' size ='10'> &nbsp; &nbsp; &nbsp;
          <li>생년월일 :  <input type = 'text' name='birth' size = '10'> &nbsp; &nbsp; &nbsp;
          <li>이메일: <input type='text' name='email' size ='10'>
          <li>비밀번호: <input type='password' name='pw' size ='10'>

          <input type = 'submit' value = '가입하기'>
      </td>
      </form>

      <tr>
      <td height = '100%' bgcolor = 'EEEEEE' align = 'center'> &nbsp;</td>
      </tr>
</table>

</TD>
</TR>
</TABLE>


</body>
</html>
