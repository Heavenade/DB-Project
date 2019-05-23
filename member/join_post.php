<?header("content-type:text/html; charset=UTF-8");
//include ("./lib/db_connect.php");
//$connect = dbconn();

$host_name= "localhost"; //호스트네임
$db_user_id = "root"; //DB userid
$db_name = "db_project";
$db_pw = "1128";
$connect = mysqli_connect($host_name,$db_user_id,$db_pw,$db_name);
mysqli_query($connect,"set names utf8");
mysqli_select_db($connect, "db_project");
if(!$connect)die("연결에 실패하였습니다." .mysqli_error());

$id=$_POST[id];
$user_id=$_POST[user_id];
$name=$_POST[name];
$nick_name=$_POST[nick_name];
$birth=$_POST[birth];
$email=$_POST[email];
$pw=$_POST[pw];

$query ="insert into members(id, user_id, name, nick_name, birth, email, pw)
 values('$id', '$user_id', '$name', '$nick_name', '$birth', '$email', '$pw')";
mysqli_query( $connect, "set names utf8");
mysqli_query($connect, $query);
mysqli_close();
?>

<script>
window. alert('회원가입이 완료 되었습니다.');
location.href = '../index.php';
</script>
