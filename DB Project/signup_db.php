<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

<?php

//oracle data base address
$db = '
(DESCRIPTION =
        (ADDRESS_LIST =
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';

$id = $_POST['id'];
$pw = $_POST['pw'];
$re_pw = $_POST['re_pw'];
$name = $_POST['user_name'];
$email = $_POST['email'];

//enter user name & password
$username = "db501group6";
$password = "test1234";

//connect with oracle_db
$connect = oci_connect($username, $password, $db, 'AL32UTF8');

//oracle db connection error message

if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
//write down your SQL here

if($_POST['pw']!=$_POST['re_pw']){
        echo "<script>alert('패스워드가 일치하지 않습니다.'); history.back(); </script>";
} else {
        $query = "insert into user_info values('$id','$name','$pw','$email')";
        $result = oci_parse($connect, $query);
        oci_execute($result);

        echo ("<script>alert('회원가입이 되었습니다!'); location.href='site.php';</script>");
}
//disconnect & logoff
oci_free_statement($stid);
oci_close($connect);
?>
</body>
</html>
