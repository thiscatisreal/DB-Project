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
        //enter user name & password

        $username = "db501group6";
        $password = "test1234";

       //connect with oracle_db
        $connect = oci_connect($username,$password,$db,'AL32UTF8');
        //enter user name & password

        if(!isset($_SESSION['id'])){
                echo "<script>alter('로그인이 필요합니다.'); location.href='login.php'; </script>"; }
        $id = $_POST['id'];
        if($_SESSION['id'] != $id) echo "<script>alert('회원 정보가 다릅니다.');history.back();</script>";
        $content = $_POST['content'];
        $r_name = $_POST['r_name'];
        $b_name = $_POST['b_name'];

        //write down your SQL here
        $sql = "select * from report where r_name='$r_name'";
        $result = oci_parse($connect, $sql);
        oci_execute($result);
        $row = oci_fetch_array($result,OCI_ASSOC);
        $hash_r_name =$row['R_NAME'];
        if($r_name==$hash_r_name){
            $sql = "update report set content = '$content' where r_name = '$r_name'";
            $result = oci_parse($connect, $sql);
                oci_execute($result);
                echo "<script>alert('수정 완료'); location.herf='book_report.php';</script>";
            }
            else{
                echo "<script>alert('수정에 실패했습니다.');history.back();</script>";
            }

            oci_free_statement($result);
            oci_close($connect);

    ?>
