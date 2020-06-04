<?
function dbconn()
{
$host_name= "localhost"; //호스트네임
$db_user_id = "root"; //DB userid
$db_name = "db_project";
$db_pw = "1128";
$connect = mysqli_connect($host_name,$db_user_id,$db_pw,$db_name);
mysqli_query($connect,"set names utf8");
mysqli_select_db($connect, "db_project");
if(!$connect)die("연결에 실패하였습니다." .mysqli_error());
return $connect;
}

//에러메세지 출력
function Error($msg)
{
  echo "
  <script>
  window.alert('$msg');
  history.back(1);
  </script>
  ";
  exit;//위에 에러메세지만 띄운다.
}

function member()
{
  global $connect;
  $temps=$_COOKIE["COOKIES"];
  $cookies = explode("//",$temps);

  //아이디 $cookies[0];
  //비밀번호 $cookies[1];

  /////////회원정보///////////
  $query = "select * from members where user_id = '$cookies[0]'";
  mysqli_query($connect, "set names utf8");
  $result = mysqli_query($connect, $query);
  $member=mysqli_fetch_array($result);
  return $member;
}

function random_creature($random_num)
{
  $query = "select * from creature where creature_id = '$random_num'";
  mysqli_query($connect, "set names utf8");
  $result = mysqli_query($connect, $query);
  $creature=mysqli_fetch_array($result);
  return $creature;
}

?>
