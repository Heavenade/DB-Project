<!-- 아지트에서 수행한 검색에 대한 결과를 출력하는 페이지 -->

<html>
  <head>
    <meta http-equiv="content-type" content = "text/html; charset = UTF-8" />
    <title> history </title>
  </head>
  <body>

    <?
    header("content-type:text/html; charset=UTF-8");
    include "../../../lib/db_connect.php";
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

    <!--메뉴 -->
    <a href = "../../../index.php">[홈]</a> <br> <br>
    <center>
    <a href = "../../agit.php">아지트로 돌아가기</a> <br> <br>
    </center>

    <center>
    <h3>검색 결과</h3><br>
    </center>

    <?
    //상성이 좋은 크리쳐를 검색했을 경우 그에 대한 답변 출력
      if($_POST[search] == "creature_like")
      {
        //Join과 Subquery 활용
        $query = "select a.creature_id as creature_id, (select c.creature_name from creature c where c.creature_id = a.creature_id) as creature_name, b.creature_name as creature_like
        from creature_owned a, creature b
        where a.creature_like = b.creature_id and a.user_id = '$member[user_id]' order by a.no";
        mysqli_query( $connect, "set names utf8");
        $result = mysqli_query($connect,$query);

        $tmpnum = 1; //데이터의 순번 출력용 변수

        //데이터 연속 출력
        while($data = mysqli_fetch_array($result))
        {
          ?>
          <tr>
            <td width='100%' height = '50' align='left' valign='center' bgcolor='#FFFFFF'>
              <br>
              <center>
              <?=$tmpnum?>. <br>
              <img src= "../../../image/creatureimage/creature_<?=$data[creature_id]?>.png" >
                이름 :  <? echo $data[creature_name]." | "; ?>
                상성이 좋은 크리쳐 : <? echo $data[creature_like]; ?>
              </center>
            </td>
          <?
          $tmpnum ++;
        }
      }
    ?>

  </body>
</html>
