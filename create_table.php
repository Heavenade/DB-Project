<? header("content-type:text/html; charset=UTF-8");

include ("./lib/db_connect.php");
$connect = dbconn();


$sql = "create table members
        (no int NOT NULL AUTO_INCREMENT,
        id char(15),
        user_id char(15),
        name char(15),
        nick_name char(15),
        birth char(8),
        email char(30),
        pw char(30),
        PRIMARY KEY(no)
        );";


mysqli_query($connect, $sql);
if(!$sql)die("테이블 생성에 실패하였습니다." .mysqli_error());


?>
