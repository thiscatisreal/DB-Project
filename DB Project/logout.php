<?php
        session_start();
        echo("<script>alert('로그아웃 되었습니다.'); location.href='site.php';</script>");
        session_destroy();
?>
<meta http-equiv="refresh" content="0;url=site.php" />

Modify.php

<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
$db = '
(DESCRIPTION =
        (ADDRESS_LIST =
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';
//enter user name & password

$username = "db501group6";
$password = "test1234";

//connect with oracle_db
$connect = oci_connect($username, $password, $db);

//oracle db connection error message
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$r_name=$_REQUEST['text'];
$content=$_REQUEST['textarea'];
$r_num=$_REQUEST['r_num'];
$id=$_REQUEST['id'];
$sql="update bookreport set r_name='$r_name', content='$content' where r_num=$r_num";
//parse SQL
$stid = oci_parse($connect, $sql);

//send SQL
oci_execute($stid);
if(oci_execute($stid)){
    echo "<center><h1>수정중</h1></center>";
    echo "<script>location.href='bookreport.php?id=$id</script>";
}
oci_free_statement($stid);
oci_close($connect);
?>
</body>
</html>
