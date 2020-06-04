<!-- 구매할 수 있는 아이템 (상점)을 출력하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> Store </title>
  </head>
  <body>

    <? header("content-type:text/html; charset=UTF-8");

    include ("../lib/db_connect.php");
    $connect = dbconn();
    $member = member();

    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님의 상점";
    }
    else {?>

      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>
    <?}?>

    <!-- 메뉴출력 -->
    <a href = "../index.php">[홈]</a> <br><br>

   <!-- 소지액 표시 -->
    <center>
    <h3>상점</h3><br>
    <? echo "현재 소지액 : ".$member[money]; ?>
    </center>

    <?
    //전체 아이템 중에서 상점 아이템 구분
    $query = "select * from item where item_type = 1";
    mysqli_query($connect,"set names utf8");
    $result = mysqli_query($connect,$query);

    //아이템을 상점 페이지에 출력
    while($data = mysqli_fetch_array($result))
    {
      $tmpquery = "select * from item where item_id = '$data[item_id]'";
      mysqli_query($connect, "set names utf8");
      $tmpresult = mysqli_query($connect, $tmpquery);
      $data_origin = mysqli_fetch_array($tmpresult);
      ?>

      <!-- 아이템 정보 출력 -->
      <tr>
        <td width='100%' height = '50' align='left' valign='center' bgcolor = '#FFFFFF'>
          <br>
          <center>

          <img src= "../image/itemimage/item_<?=$data[item_id]?>.png"> <br> <br>
          아이템 이름 : <?=$data_origin[item_name]?> <br>
          <?=$data_origin[description]?> <br><br>

          가격 : <?=$data_origin[buy_price]?> <br>
          <form action='./store/buy_post.php' method = 'post'>
            (구매할 아이템 개수를 입력 후 구매버튼을 눌러주세요.) <br>
            <input type="hidden" name ="item_id" value = "<?=$data[item_id]?>">
            <input type = 'text' name = 'buy_num' size = '10'>
            <input type='submit' value = '구매'>
          </form>

        </center>
        </td>
    <?
    }
    ?>


  </body>
</html>
