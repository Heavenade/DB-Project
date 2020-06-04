<!-- 로그인 페이지에서 정보를 받아 로그인을 수행하는 페이지 -->

<? header("content-type:text/html; charset=UTF-8");
include "../lib/db_connect.php";
$connect = dbconn();

$user_id=$_POST[user_id];
$pws=$_POST[pw];


$pw=md5($pws);


//나의 정보 데이터 가지고 오기
$query="select * from members where user_id = '$user_id'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$member = mysqli_fetch_array($result);

if(!$user_id){Error("아이디를 입력하세요.");}
elseif(!$member[user_id]){Error("존재하지 않는 회원 아이디입니다.");}

if(!$pw){Error("비밀번호를 입력하세요.");}
elseif($member[pw]!=$pw){ Error("비밀번호가 같지 않습니다.");}

//쿠키 생성
if($member[user_id] and $member[pw]==$pw)
{
  $tmp=$member[user_id]."//".$member[pw];
  setcookie("COOKIES",$tmp,time()+60*60*24,"/"); //24시간동안 유효한 쿠키
}
?>

<script>
window.alert('로그인 되었습니다.');
location.href='../index.php';
</script>
