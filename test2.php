<?
header("content-type:text/html; charset=UTF-8");

$id= $_POST[id];
$user_id= $_POST[user_id];
$pw= $_POST[pw];
$name= $_POST[name];

$regdate=date("YmdHis",time());
$ip=getenv("REMOTE_ADDR");

$connect = mysqli_connect("localhost","root","1128","db_project"); //mysql 연결
mysqli_select_db($connect,"db_project");
mysqli_query($connect, "set names utf8");
if(!$connect)
{
  echo "연결 실패" .MYSQL_ERROR();
}

//쿼리전송

$query = "insert into member(id, user_id, name, pw, regdate, ip)
values('$id', '$user_id', '$name', '$pw', '$regdate', '$ip')";


mysqli_query($connect, $query);

mysqli_close($connect);

?>

<script>
window, alert('쿼리가 정상적으로 전송 되었습니다.');
location.href='/index.php';
</script>
