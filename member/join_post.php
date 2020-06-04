<!-- 회원가입 페이지에서 회원정보를 받아 회원가입을 수행하는 페이지 -->

<?header("content-type:text/html; charset=UTF-8");
include "../lib/db_connect.php";
$connect = dbconn();

$user_id=$_POST[user_id];
$name=$_POST[name];
$birth=$_POST[birth];
$email=$_POST[email];
$pws=$_POST[pw];

//나의 정보 데이터 가지고 오기
$query="select * from members where user_id = '$user_id'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$member = mysqli_fetch_array($result);

if(!$user_id){Error("아이디를 입력하세요.");}
if($member[user_id]){Error("중복된 회원 아이디입니다.");}
if(!$name){Error("이름을 입력하세요.");}
if(!$birth){Error("생일을 입력하세요.");}
if(!$email){Error("이메일을 입력하세요.");}
if(!$pws){Error("비밀번호를 입력하세요.");}

$pw = md5($pws);//비밀번호 암호화

$query ="insert into members(user_id, name, birth, email, pw)
 values('$user_id', '$name', '$birth', '$email', '$pw')";
mysqli_query( $connect, "set names utf8");
mysqli_query($connect, $query);
mysqli_close();
?>

<script>
window. alert('회원가입이 완료 되었습니다.');
location.href = '../index.php';
</script>
