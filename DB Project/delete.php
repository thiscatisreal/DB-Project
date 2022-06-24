<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            error_reporting(E_ALL);
         ini_set("display_errors", 1);

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
         $connect = oci_connect($username, $password, $db,'AL32UTF8');

         //oracle db connection error message
         if(!$connect){
               $e = oci_error();
               trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
         }
        $sql = "SELECT * FROM report WHERE r_num ='$_GET[r_num]'";
         $result = oci_parse($connect, $sql);
         oci_execute($result);
         $row = oci_fetch_array($result,OCI_ASSOC);
         $r_num = $row['R_NUM'];
            $query = "DELETE FROM report WHERE r_num  = '$r_num'";
            $postResult = oci_parse($connect, $query);
            oci_execute($postResult);
            if($postResult) {

               echo(" <script>
                    alert('삭제되었습니다.');
                    location.href='mypage.php';
                </script>");

            } else {

               echo(" <script>
                    alert('삭제에 실패했습니다.');
                    history.back();
                </script>");

            }
        ci_free_statement($postResult);
        ci_close($connect);
?>

    </body>
</html>
