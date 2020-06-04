<!-- 크리쳐 상세 정보를 출력하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> agit_detail </title>
  </head>
  <body>

<? header("content-type:text/html; charset=UTF-8");
include "../../lib/db_connect.php";
$connect = dbconn();

$creature_id = $_POST[creature_id];

//크리쳐 정보 받아오기
$query = "select * from creature where creature_id = '$creature_id'";
mysqli_query( $connect, "set names utf8");
$result = mysqli_query($connect, $query);
$creature_data = mysqli_fetch_array($result);

//크리쳐 타입 정보 받아오기
$query_type = "select * from creature_type where creature_type = '$creature_data[creature_type]'";
mysqli_query( $connect, "set names utf8");
$result_type = mysqli_query($connect, $query_type);
$type_data = mysqli_fetch_array($result_type);

//소유한 크리쳐 정보 받아오기
$query_info = "select * from creature_owned where no = '$_POST[no]'";
mysqli_query( $connect, "set names utf8");
$result_info = mysqli_query($connect, $query_info);
$info_data = mysqli_fetch_array($result_info);

//크리쳐 서식지 정보 받아오기
$query_habit = "select * from creature_habitation where creature_habitation = '$creature_data[habitation]'";
mysqli_query( $connect, "set names utf8");
$result_habit = mysqli_query($connect, $query_habit);
$habit_data = mysqli_fetch_array($result_habit);

//상성이 좋은 크리쳐 정보 받아오기
$tmpquery2 = "select creature_name from creature where creature_id = '$info_data[creature_like]'";
mysqli_query($connect, "set names utf8");
$tmpresult2 = mysqli_query($connect, $tmpquery2);
$data_origin2 = mysqli_fetch_assoc($tmpresult2);
$tmp_creature_like = $data_origin2["creature_name"];

mysqli_close();
?>

<td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
  <br>
  <center>

  <a href = "../../index.php">[홈]</a>
  <a href = "../agit.php">[아지트로 돌아가기]</a> <br><br>


  <center>
  <h3>크리쳐 상세</h3><br>
  </center>
  <br>

  <img src = "../../image/creatureimage/creature_<?=$creature_data[creature_id]?>.png" > <br><br>

  이름 : <?=$creature_data[creature_name]?> <br>
  타입 : <?=$type_data[creature_type_char]?> <br>
  사는 지역 : <?=$habit_data[creature_habitation_char]?> <br> <br>
  <?=$creature_data[description]?> <br> <br>
  무게 : <?=$info_data[weight]?> <br>
  신장 : <?=$info_data[height]?> <br>
  상성이 좋은 크리쳐 : <?=$tmp_creature_like?> <br>
  <br><br>

  <form action='./release_post.php' method = 'post'>
    <input type="hidden" name ="no" value = "<?=$info_data[no]?>">
    <input type='submit' value = '방출'>
  </form>
</center>
</td>

  </body>
  </html>
