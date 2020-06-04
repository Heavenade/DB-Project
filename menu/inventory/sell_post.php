<!-- 아이템 판매를 수행하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> explore </title>
  </head>
  <body>

<? header("content-type:text/html; charset=UTF-8");
include "../../lib/db_connect.php";
$connect = dbconn();
$member = member();

$user_id=$member[user_id];
$item_id=$_POST[item_id];
$sell_num = $_POST[sell_num];


$query = "select sell_price from item where item_id = '$item_id'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($result);

$query2 = "select item_num from item_owned where item_id = '$item_id'";
mysqli_query($connect,"set names utf8");
$result2 = mysqli_query($connect,$query2);
$data2 = mysqli_fetch_assoc($result2);


$money = $member[money];
$price = $data["sell_price"];
$item_num = $data2["item_num"];


if(($sell_num > $item_num) or $sell_num <=0 or !$sell_num) {Error("유효하지 않은 값입니다.");}



$money = $money + $price * $sell_num;
$item_num = $item_num - $sell_num;

$query3 = "update members set money = $money where user_id = '$member[user_id]'";
mysqli_query($connect,"set names utf8");
mysqli_query($connect,$query3);

if($item_num > 0)
{
  $query4 = "update item_owned set item_num = $item_num where item_id = $item_id";
  mysqli_query($connect,"set names utf8");
  mysqli_query($connect,$query4);

}
else
{
  $query5 = "delete from item_owned where item_id = $item_id";
  mysqli_query($connect,"set names utf8");
  mysqli_query($connect,$query5);

}
?>

<script>
window.alert('판매되었습니다!');
location.href='../inventory.php';
</script>

</body>
</html>
