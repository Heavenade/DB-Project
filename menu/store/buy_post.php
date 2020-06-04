<!-- 아아템 구매를 수행하는 페이지 -->
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

//넘겨받은 정보
$user_id=$member[user_id];
$item_id=$_POST[item_id];
$buy_num = $_POST[buy_num];

$query = "select buy_price from item where item_id = '$item_id'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($result);

$money = $member[money];
$price = $data["buy_price"] * $buy_num;


if(!$buy_num){Error("값을 입력해주세요.");}


//아이템이 하나이상 있는지 확인
$check_item_query = "select * from item_owned where item_id = $item_id  and user_id = '$member[user_id]'";
$check_item_result = mysqli_query($connect,$check_item_query);
$check_item_data= mysqli_fetch_array($check_item_result);


if($money < $price){Error("잔액이 부족합니다.");} //돈부족 구매 불가
//돈충분 구매
else
{
  if(!$check_item_data)//아이템을 처음 얻었을 경우
  {
    $item_insert_query = "insert into item_owned ( user_id, item_id, item_num)
    values ('$user_id', '$item_id', $buy_num)";
    mysqli_query($connect,$item_insert_query);

  }
  else //이미 가지고 있었을 경우
  {
    $tmp_q = "select * from item_owned where item_id = $item_id";
    $tmp = mysqli_query($connect,$tmp_q);
    $tmp_d = mysqli_fetch_array($tmp);
    $item_num_next = $tmp_d["item_num"] + $buy_num;

    $item_insert_query = "update item_owned set item_num = $item_num_next where item_id = $item_id";
    mysqli_query($connect,$item_insert_query);
  }

  $money = $money - $price;
  $query3 = "update members set money = $money where user_id = '$member[user_id]'";
  mysqli_query($connect,"set names utf8");
  mysqli_query($connect,$query3);
}

?>

<script>
window.alert('구매하였습니다!');
location.href='../store.php';
</script>

</body>
</html>
