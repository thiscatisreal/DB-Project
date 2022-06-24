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
        $content = $_POST['content'];
        $r_name = $_POST['r_name'];
        $b_name = $_POST['b_name'];
        $hit = 0;

        //write down your SQL here
        $sql = "SELECT * FROM book WHERE b_name='$b_name'";
        $result = oci_parse($connect, $sql);
        oci_execute($result);
        $row = oci_fetch_array($result,OCI_ASSOC);
        $hash_b_name =$row['B_NAME'];
        if($b_name==$hash_b_name){
            $ </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>

<?php
include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";

$bno = $_GET['idx'];
$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$sql = query("update board set name='".$username."',pw='".$userpw."',title='".$title."',content='".$content."' where idx='".$bno."'"); ?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/BBS/index.php">
<footer>
            <img src="address.png" alt="address" >
        </footer>

    </div>
</body>
</html>
b_num = $row['B_NUM'];
            $sql = "select count(*) from report";
            $result = oci_parse($connect, $sql);
            oci_execute($result);
            $row = oci_fetch_row($result);
            $r_num = $row[0]+1;

            $sql = "insert into report values('$r_num','$id','$r_name','$b_num','$content','','$hit')";
            $result = oci_parse($connect, $sql);
            oci_execute($result);
                echo ("<script>alert('작성 완료');location.herf='book_report.php';</script>");
            }
            else{
                echo "<script>alert('책이 존재하지 않습니다.');history.back();</script>";
            }

            oci_free_statement($result);
            oci_close($connect);

    ?>
    </body>
    </html>
