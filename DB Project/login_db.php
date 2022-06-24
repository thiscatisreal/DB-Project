<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>
//error message code

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
        //enter user name & password

        $username = "db501group6";
        $password = "test1234";

       //connect with oracle_db
        $connect = oci_connect($username,$password,$db,'AL32UTF8');
        //enter user name & password
        $id = $_POST['id'];
        $pw = $_POST['pw'];

        //write down your SQL here
        $sql = "SELECT * FROM user_info WHERE id='$id'";
        $result = oci_parse($connect, $sql);
        $stid = oci_parse($connect,$sql);
        oci_execute($result);

        $row = oci_fetch_array($result,OCI_ASSOC);
        $hashpw = $row['PW'];

        if($pw==$hashpw){

            // 세션에 저장
            session_start();
            $_SESSION['ID']=$row['ID'];
            $_SESSION['NAME']=$row['USER_NAME'];

            echo "<script>alert('로그인 되었습니다!'); location.href='site.php';</script>";
        }
        else{
            echo "<script>alert('아이디 혹은 비밀번호를 확인하세요!'); history.back();</script>";
        }

?>
</body>
</html>
