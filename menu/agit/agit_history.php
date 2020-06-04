<!-- 크리쳐 획득 기록을 출력하는 페이지 -->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> history </title>
  </head>
  <body>

    <? header("content-type:text/html; charset=UTF-8");

    include ("../../lib/db_connect.php");
    $connect = dbconn();
    $member = member();

    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님의 히스토리";
    }
    else {?>

      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>
    <?}?>

    <a href = "../../../index.php">[홈]</a> <br> <br>

    <center>
    <a href = "../agit.php">아지트로 돌아가기</a> <br> <br>

    <h3>크리쳐 획득 히스토리</h3><br>
    </center>

    <?

    $query = "select * from creature_history where user_id = '$member[user_id]' ";
    mysqli_query($connect,"set names utf8");
    $result = mysqli_query($connect,$query);

    $tmpnum = 1;

    //데이터 연속 출력 : 크리쳐 획득 기록 불러오기
    while($data = mysqli_fetch_array($result))
    {
      $tmpquery = "select * from creature where creature_id = '$data[creature_id]'";
      mysqli_query($connect, "set names utf8");
      $tmpresult = mysqli_query($connect, $tmpquery);
      $data_origin = mysqli_fetch_array($tmpresult);

      $tmpquery2 = "select creature_name from creature where creature_id = '$data[creature_like]'";
      mysqli_query($connect, "set names utf8");
      $tmpresult2 = mysqli_query($connect, $tmpquery2);
      $data_origin2 = mysqli_fetch_assoc($tmpresult2);
      $tmp_creature_like = $data_origin2["creature_name"];
      ?>
      <tr>
        <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
          <br>
          <center>
          <?=$tmpnum?>. <br>

          <img src= "../../image/creatureimage/creature_<?=$data[creature_id]?>.png" >
          이름 :  <? echo $data_origin[creature_name]." | "; ?>
          무게 :  <? echo $data[weight]." | "; ?>
          신장 :  <? echo $data[height]." | "; ?>
          상성이 좋은 크리쳐 : <? echo $tmp_creature_like." | "; ?>
          획득 시각 : <? echo $data[time]; ?> <br><br>

          </center>
        </td>
    <?
      $tmpnum ++;
    }

    ?>


  </body>
  </html>
