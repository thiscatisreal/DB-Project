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
$connect = oci_connect($username, $password, $db);

//oracle db connection error message
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>
<?php
        session_start();
        $pwd = $_POST['PWD'];

        if(isset($_SESSION['ID']))
        {
            $id = $_SESSION['ID'];
        }

        $sql = "UPDATE PW SET PWD = '$pwd' WHERE ID = '$id'";
        $result = $db->query($sql)

        if($result){
        echo "success";
        }else{
        echo "Fail:Save";
         }
        ?>
