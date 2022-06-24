<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="UTF-8">

    </head>
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
        $connect = oci_connect($username, $password, $db,'AL32UTF8');

        //oracle db connection error message
        if(!$connect){
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        ?>
        <style>
            *{margin: 0px; padding: 0px;}
ul{list-style: none;} /* 리스트 앞에 . 같은거 제거*/
a{text-decoration: none;} /* 링크에 밑줄 같은거 제거*/

header{

    width: 800px; /*메인 이미지의 너비 사이즈와 같음 */
    height: 95px;
    background-color: #2d3a4b;

    /* header 안에 요소들을 모두 absolute 포지션으로 배치할 것이라서 */
    /* absolute 요소가 header의 좌상단을 기준으로 하려면 */
    /* header의 position이 relative 여야만 함 */
    position: relative;
}

/* 제목영역안에 있는 메인 로고 이미지 위치 지정 */
#logo{
    position: absolute;
    top: 30px;
    left: 30px;

}
/* 제목영역안에 오른쪽 상단에 top_menu 배치 */
#top_menu{
    position: absolute;
    top: 20px;
    right: 10px;
    color: white;
}

/* top_menu a의 글시 하얀색으로 */
#top_menu a{color: white;}

/* 헤더 영역안에 네비게이션 메뉴 배치 */
nav{
    position: absolute;
    bottom: 10px;
    left: 220px;
    font-size: 16px;
}

nav li{
    display: inline;
    margin-left: 30px;
}

nav li a{color: white;}

/* 콘텐츠 영역의 알래에 있는 배너 이미지 inline으로 */
#content li{
    display: inline;
    margin-left: 50px;
}
/* footer 영역 */
footer{
    width: 800px; /*헤더와 같은 사이즈*/
    height: 90px;
    margin-top: 20px;
    text-align: center;
    background-color: #f1f1f1;
}

/* 전체 페이지가 가운데로 오도록 */
#page{width: 820px; margin: 0px auto;}
        </style>
        <div id="page">

            <header>

                <div id="logo">
                    <img src="logo.png" alt="Logo" style="position:absolute; width:55px; height:55px; top:0px; left:0px;">
                </div>

                <div id="top_menu">
                    <a href="site.php">HOME</a> |
                    <a href="login.php">LOGIN</a> |
                    <a href="signup.php">SIGN UP</a> |
                    <a href="mypage.php">MY PAGE</a>
                </div>

                <div style="position:absolute; width:55px; top:116px; left:750px;">
                    <button onclick="location.href='report_w.php'">글쓰기</button >
                </div>

                <nav>
                    <ul>
                        <li><a href="book.php">BOOK</a></li>
                        <li><a href="bookreport.php">BOOK REPORT</a></li>
                        <li><a href="monthbook.php">MONTHLY BOOK</a></li>
                    </ul>
                </nav>

            </header>
            <h2>자유 게시판</h2>
            <table style="width:90%">
                <!-- <caption class="readHide">자유게시판</caption> -->
                <tr style="background-color: #798da7">
                    <th scope="col" style="color: white" class="no">번호</th>
                    <th scope="col" style="color: white" class="title">제목</th>
                    <th scope="col" style="color: white" class="author">작성자</th>
                </tr>
                <tr style="text-align: center;">
                     <td></td>
                </tr>
                <body>
                     <?php
                        $sql = ("SELECT r_num, r_name, id FROM report");
                        $stid = oci_parse($connect, $sql);
                        oci_execute($stid);

                        while($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

                            echo "<tr>\n";
                            foreach ($row as $item) {
                                echo" <td><a href='show_report.php?r_num={$row['R_NUM']}'>".($item !== NULL ? htmlentities($item, ENT_QUOTES) : "&nbsp;"). "</a></td\n>";
                        }
                        echo "</tr>\n";
                    }
                    //disconnect & logoff
                    oci_free_statement($stid);
                    oci_close($connect);
                ?>
                </body>
                </table>
        <?php
                         $total_col = 49; // 총 컬럼 수
                         $now_page = 1; // 현재 페이지
                         $page_col_num = 5; // 한 페이지 컬럼 수
                         $page_block_num = 3;

                 function paging($total_col, $now_page, $page_col_num, $page_block_num) {
                         $total=$total_col; // 총 컬럼 수
                         $page=$now_page; // 현재 페이지
                         $page_num=$page_col_num; // 한 페이지 컬럼 수
                         $block_num=$page_block_num; // 한 페이지 블럭 수

                         $limit_start=$page_num * $page - $page_num; // limit 시작 위치

                         $total_page=ceil($total/$page_num); // 총 페이지
                         $total_black=ceil($total_page/$block_num); // 총 블럭

                         $now_block=ceil($page/$block_num); // 현재 페이지의 블럭
                         $start_page=(($now_block*$block_num)-($block_num-1)); // 가져올 페이지의 시작번호
                         $last_page=($now_block*$block_num); // 가져올 마지막 페이지 번호

                         $prev_page=($now_block*$block_num)-$block_num; // 이전 블럭 이동시 첫 페이지
                         $next_page=($now_block*$block_num)+1; // 다음 블럭 이동시 첫 페이지// 이전 페이지
                         if($now_block > 1){
                                 echo "<a href=$_SERVER[PHP_SELF]?page=$prev_page> [◀] </a>";
                         }
                         // echo "이전 페이지 : $prev_page";

                         // 페이지 리스트
                         if($last_page < $total_page) {
                                 $for_end=$last_page;
                         }
                         else{
                                 $for_end=$total_page;
                         }
                         for($i=$start_page; $i<=$for_end; $i++){
                                 echo "<a href=$_SERVER[PHP_SELF]?page=$i> $i </a>";
                         }

                         // 다음 페이지
                         if($now_block < $total_black){
                         echo "<a href=$_SERVER[PHP_SELF]?page=$next_page> [▶] </a>"; }
                         // echo "다음 페이지 : $next_page";
                 }
                 ?>
            <footer>
                <img src="address.png" alt="address" >
            </footer>

        </div>
    </body>
</html>
