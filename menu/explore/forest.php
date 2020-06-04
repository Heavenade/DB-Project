<!-- 탐험 - 숲-->
<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> explore </title>
  </head>
  <body>

    <? header("content-type:text/html; charset=UTF-8");

    include ("../../lib/db_connect.php");
    $connect = dbconn();
    $member = member();

    if ($member[user_id])
    {
      echo $member[name]."(".$member[user_id].")님의 탐험 중 동굴";
    }
    else {?>
      <script>
      window.alert('로그인 후 사용가능합니다.');
      location.href='../index.php';
      </script>
    <?}?>
    <a href = "../../index.php">[홈]</a>
    <a href = "../explore.php">[탐험으로 돌아가기]</a>

    <center>
    <h3>숲</h3><br>
    </center>

    <?
    $query = "select count(*) from creature";
    mysqli_query($connect,"set names utf8");
    $result = mysqli_query($connect,$query);
    $data= mysqli_fetch_assoc($result);
    $random_num = $data["count(*)"]; // 랜덤돌릴 총 크리쳐 수

    $tmp_habitation = '0';

    while($tmp_habitation != '2')
    {
      $random_result = mt_rand (1, $random_num);//랜덤으로 수 추출
      $tmpquery = "select habitation from creature where creature_id = '$random_result'";//크리쳐 아이디 = 랜덤 리줄트
      $tmpresult = mysqli_query($connect,$tmpquery);
      $tmpdata = mysqli_fetch_assoc($tmpresult);
      $tmp_habitation = $tmpdata["habitation"];
    }

    //상성이 좋은 크리쳐를 랜덤으로 결정
    $random2_result = mt_rand (1, $random_num);//랜덤으로 수 추출



    $tmp_wmin_query = "select weight_min from creature_random where creature_id ='$random_result'";
    $tmpwminresult = mysqli_query($connect,$tmp_wmin_query);
    $tmpwmindata = mysqli_fetch_assoc($tmpwminresult);
    $tmp_weight_min = $tmpwmindata["weight_min"];

    $tmp_wmax_query = "select weight_max from creature_random where creature_id ='$random_result'";
    $tmpwmaxresult = mysqli_query($connect,$tmp_wmax_query);
    $tmpwmaxdata = mysqli_fetch_assoc($tmpwmaxresult);
    $tmp_weight_max = $tmpwmaxdata["weight_max"];


    $tmp_hmin_query = "select height_min from creature_random where creature_id ='$random_result'";
    $tmphminresult = mysqli_query($connect,$tmp_hmin_query);
    $tmphmindata = mysqli_fetch_assoc($tmphminresult);
    $tmp_height_min = $tmphmindata["height_min"];


    $tmp_hmax_query = "select height_max from creature_random where creature_id ='$random_result'";
    $tmphmaxresult = mysqli_query($connect,$tmp_hmax_query);
    $tmphmaxdata = mysqli_fetch_assoc($tmphmaxresult);
    $tmp_height_max = $tmphmaxdata["height_max"];


    $tmp_weight = mt_rand ($tmp_weight_min, $tmp_weight_max);
    $tmp_height = mt_rand ($tmp_height_min, $tmp_height_max);



    $tmp_user_id = $member[user_id];
    $tmp_creature_id = $random_result;
    $tmp_habitation;//준비완료


    //소유 크리쳐 리스트에 삽입
    $creature_insert_query = "insert into creature_owned (user_id, creature_id, weight, height,creature_like)
    values ('$tmp_user_id', '$tmp_creature_id', '$tmp_weight','$tmp_height','$random2_result')";
    mysqli_query($connect,$creature_insert_query);

    //크리쳐 획득 기록에 삽입
    $history_insert_query = "insert into creature_history (user_id, creature_id, weight, height,creature_like)
    values ('$tmp_user_id', '$tmp_creature_id', '$tmp_weight','$tmp_height','$random2_result')";
    mysqli_query($connect,$history_insert_query);

    $tmpquery2 = "select creature_name from creature where creature_id = '$tmp_creature_id'";//크리쳐 아이디 = 랜덤 리줄트
    $tmpresult2 = mysqli_query($connect,$tmpquery2);
    $tmpdata2 = mysqli_fetch_assoc($tmpresult2);
    $tmp_creature_name = $tmpdata2["creature_name"];

    $tmpquery2 = "select creature_type from creature where creature_id = '$tmp_creature_id'";//크리쳐 아이디 = 랜덤 리줄트
    $tmpresult2 = mysqli_query($connect,$tmpquery2);
    $tmpdata2 = mysqli_fetch_assoc($tmpresult2);
    $tmp_creature_type=$tmpdata2["creature_type"];

    $query_type = "select * from creature_type where creature_type = '$tmp_creature_type'";
    mysqli_query( $connect, "set names utf8");
    $result_type = mysqli_query($connect, $query_type);
    $type_data = mysqli_fetch_array($result_type);

    ?>

    <tr>
      <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
        <br>
        <center>
        크리쳐를 획득했습니다! <br> <br>

        <img src = "../../image/creatureimage/creature_<?=$tmp_creature_id?>.png" > <br><br>

        이름 : <?=$tmp_creature_name?> <br>
        크리쳐 타입 : <?=$type_data[creature_type_char]?> <br>

        무게 : <?=$tmp_weight?> <br>
        신장 : <?=$tmp_height?> <br>
      </center>
      </td>

  </body>
</html>
