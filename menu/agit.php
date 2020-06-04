<!-- 획득한 크리쳐를 출력하는 페이지 -->

<? header("content-type:text/html; charset=UTF-8");

include ("../lib/db_connect.php");
$connect = dbconn();
$member = member();

if ($member[user_id])
{
  echo $member[name]."(".$member[user_id].")님의 아지트";
}
else {?>

  <script>
  window.alert('로그인 후 사용가능합니다.');
  location.href='../index.php';
  </script>
<?}?>
<a href = "../index.php">[홈]</a> <br> <br>

<a href = "./agit/agit_history.php">히스토리</a> <br> <br>

<div style="text-align:right">
<form action='./agit/search/search.php' method = 'post'>
  <select name="search">
    <option value="creature_like">상성이 좋은 크리쳐</option>
  </select>
  <input type='submit' value = '검색'>
</form>
</div>

<center>
<h3>아지트</h3><br>
<h5>수집한 크리쳐의 목록</h5><br>
</center>

<?
$query = "select * from creature_owned where user_id = '$member[user_id]' ";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);

$tmpnum = 1;
while($data = mysqli_fetch_array($result))
{
  $tmpquery = "select * from creature where creature_id = '$data[creature_id]'";
  mysqli_query($connect, "set names utf8");
  $tmpresult = mysqli_query($connect, $tmpquery);
  $data_origin = mysqli_fetch_array($tmpresult);
  ?>
  <tr>
    <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
      <br>
      <center>
      <?=$tmpnum?>. <br> <br>

      <form action='./agit/agit_detail.php' method = 'post'>
        <input type="hidden" name ="creature_id" value = "<?=$data[creature_id]?>">
        <input type="hidden" name ="no" value = "<?=$data[no]?>">
        <input type="image" src= "../image/creatureimage/creature_<?=$data[creature_id]?>.png"  name = "CreatureImage">
      </form>

    </center>
    </td>
<?
  $tmpnum ++;
}

?>
