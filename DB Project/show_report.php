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
$connect = oci_connect($username, $password, $db,'AL32UTF8');

//oracle db connection error message
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
//write down your SQL here
$sql = "SELECT * FROM report where r_num = '$_GET[r_num]'";

//parse SQL
$stid = oci_parse($connect, $sql);

//send SQL
oci_execute($stid);
//tabl setting
echo " <table width = '1000' border = '1' cellpadding = '5'  cellspacing = '0'>\n";

while($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

        echo "<tr>\n";
        foreach ($row as $item) {
                echo" <td><a href='re_write_page.php?r_num={$row['R_NUM']}'>".($item !== NULL ? htmlentities($item, ENT_QUOTES) : "&nbsp;"). "</a></td\n>";
        }
        echo "</tr>\n";
}

echo "</table>\n";

//disconnect & logoff
oci_free_statement($stid);
oci_close($connect);
?>
