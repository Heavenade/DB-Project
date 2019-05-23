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

?>
