<!-- 획득한 아이템을 출력하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> inventory </title>
  </head>
  <body>

<? header("content-type:text/html; charset=UTF-8");

include ("../lib/db_connect.php");
$connect = dbconn();
$member = member();

if ($member[user_id])
{
  echo $member[name]."(".$member[user_id].")님의 인벤토리";
}
else {?>

  <script>
  window.alert('로그인 후 사용가능합니다.');
  location.href='../index.php';
  </script>
<?}?>
<a href = "../index.php">[홈]</a>

<center>
<h3>인벤토리</h3><br>
<? echo "현재 소지액 : ".$member[money]; ?>
</center>

<?

$query = "select * from item_owned where user_id = '$member[user_id]' ";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);

$tmpnum = 1;
while($data = mysqli_fetch_array($result))
{

  $tmpquery = "select * from item where item_id = '$data[item_id]'";
  mysqli_query($connect, "set names utf8");
  $tmpresult = mysqli_query($connect, $tmpquery);
  $data_origin = mysqli_fetch_array($tmpresult);
  ?>
  <tr>
    <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
      <br>
      <center>
      <?=$tmpnum?>. <br><br>

      <!-- 정보출력 -->
      <img src= "../image/itemimage/item_<?=$data[item_id]?>.png"> <br> <br>
      아이템 이름 : <?=$data_origin[item_name]?> <br>
      소유 갯수 : <?=$data[item_num]?> <br><br>
      <?=$data_origin[description]?> <br> <br>

      판매 가격 : <?=$data_origin[sell_price]?> <br>
      <form action='./inventory/sell_post.php' method = 'post'>
        (판매할 아이템 개수를 입력 후 판매버튼을 눌러주세요.) <br>
        <input type="hidden" name ="item_id" value = "<?=$data[item_id]?>">
        <input type = 'text' name = 'sell_num' size = '10'>
        <input type='submit' value = '판매'>
      </form>
    </center>
    </td>
<?
  $tmpnum ++;
}?>


</body>
</html>
