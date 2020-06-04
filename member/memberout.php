<!-- 회원 탈퇴를 수행하는 페이지 -->

<? header("content-type:text/html; charset=UTF-8");
include "../lib/db_connect.php";
$connect = dbconn();

$user_id = $_POST[user_id];

$query = "delete from members where user_id = '$user_id'";
mysqli_query( $connect, "set names utf8");
mysqli_query($connect, $query);

//아이템과 크리쳐, 히스토리는 자동으로 삭제됨

mysqli_close();
?>

<script>
window. alert('회원탈퇴가 완료 되었습니다.');
location.href = '../index.php';
</script>
