<!-- 메인페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> Creature Island </title>
  </head>
  <body>

    <?
    include "./lib/db_connect.php";
    $connect = dbconn();
    $member = member();
    ?>

    <?
    //알림 메세지 출력
    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님 환영합니다.";
      echo "   Money : ".$member[money];
    }
    else{?>
    <a href = "./member/join.php">[회원가입]</a>
    <a href = "./member/login.php">[로그인]</a>
    <?}?>
    <?
    if ($member[user_id]){?>
    <a href = "./member/logout.php">[로그아웃]</a>
    <?}?>

    <br> <br>

    <!-- 메뉴 출력 -->
    <center>
    <h1>Creature Island!</h1><br><br><br>
    <h4 >Menu</h4><br>
    <a href = "./member/member_info.php">[회원정보]</a>
    <a href = "./menu/agit.php">[아지트]</a>
    <a href = "./menu/explore.php">[탐험]</a>
    <a href = "./menu/gather.php">[수집]</a>
    <a href = "./menu/store.php">[상점]</a>
    <a href = "./menu/inventory.php">[인벤토리]</a>
  </center>

  </body>
</html>
