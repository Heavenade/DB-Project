<!-- 수집 - 하늘 -->

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
    <a href = "../gather.php">[수집 메뉴로 돌아가기]</a>


    <center>
    <h3>하늘</h3><br>
    </center>

    <?
    $query = "select count(*) from item";
    mysqli_query($connect,"set names utf8");
    $result = mysqli_query($connect,$query);
    $data= mysqli_fetch_assoc($result);
    $random_num = $data["count(*)"]; // 랜덤돌릴 총 아이템 수



    $tmp_user_id = $member[user_id];
    //얻을 아이템 갯수를 랜덤 돌리기
    $random_item_num = mt_rand (1, 5); //최소1 최대 5
    $tmp_item_num = $random_item_num;

    ?> <center> 아이템을 획득했습니다! </center> <br> <br>  <?

    //아이템 얻기 반복
    while($tmp_item_num > 0)
    {
      $tmp_item_place = '0';
      //장소가 땅인 아이템을 랜덤으로 얻음
      while($tmp_item_place != '3')
      {
        $random_result = mt_rand (1, $random_num);//랜덤으로 수 추출
        $tmpquery = "select item_place from item where item_id = '$random_result'";
        $tmpresult = mysqli_query($connect,$tmpquery);
        $tmpdata = mysqli_fetch_assoc($tmpresult);
        $tmp_item_place = $tmpdata["item_place"];
      }

      //유저아이디, 아이템 아이디
      $tmp_item_id = $random_result;


      //아이템이 하나이상 있는지 확인
      $check_item_query = "select * from item_owned where user_id = '$tmp_user_id' and item_id = $tmp_item_id";
      $check_item_result = mysqli_query($connect,$check_item_query);
      $check_item_data= mysqli_fetch_array($check_item_result);


      if(!$check_item_data)//아이템을 처음 얻었을 경우
      {
        $item_insert_query = "insert into item_owned (user_id, item_id, item_num)
        values ('$tmp_user_id', '$tmp_item_id', 1)";
        mysqli_query($connect,$item_insert_query);
      }
      else //이전에 소유하고 있던 아이템인 경우
      {
          $tmp_q = "select * from item_owned where item_id = $tmp_item_id";
          $tmp = mysqli_query($connect,$tmp_q);
          $tmp_d = mysqli_fetch_array($tmp);
          $item_num_next = $tmp_d["item_num"] + 1;

          $item_insert_query = "update item_owned set item_num = $item_num_next where item_id = $tmp_item_id";
          mysqli_query($connect,$item_insert_query);
      }

      //아이템 이름 얻기
      $tmpquery2 = "select item_name from item where item_id = '$tmp_item_id'";
      $tmpresult2 = mysqli_query($connect,$tmpquery2);
      $tmpdata2 = mysqli_fetch_assoc($tmpresult2);
      $tmp_item_name = $tmpdata2["item_name"];

      ?>

      <tr>
        <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
          <br>
          <center>

          <?=$tmp_item_name //획득한 아이템 이름 ?> <br>

        </center>
        </td>

      <?
      $tmp_item_num = $tmp_item_num -1;

    }?>

  </body>
</html>
