<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
?>


<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <title>Book</title>

</head>
<body>
    <style>*{margin: 0px; padding: 0px;}
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

            <div style="float:right; margin-top:63px;">
                <input type="text" placeholder="검색어 입력" >
                <button >검색 </button>
            </div>

            <nav>
                <ul>
                    <li><a href="book.php">BOOK</a></li>
                    <li><a href="bookreport.php">BOOK REPORT</a></li>
                    <li><a href="monthbook.php">MONTHLY BOOK</a></li>
                </ul>
            </nav>

        </header>
        <h2>나의 독후감 목록</h2>
            <table style="width:90%">
                <tr style="background-color: #798da7">
                    <th style="color: white";>작성번호</th><th style="color: white;">제목</th><th style="color: white;">작성자</th>
                </tr>
                <tr style="text-align: center;">
                     <td></td>
                </tr>
                <body><?php
    session_start();
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

        $username = "db501group6";
        $password = "test1234";

       //connect with oracle_db
        $connect = oci_connect($username,$password,$db,'AL32UTF8');

        if(isset($_SESSION['ID']))
        {
            $id = $_SESSION['ID'];

        }


        $sql = ("SELECT USER_NAME FROM user_info WHERE ID='$id'");
        $stid = oci_parse($connect,$sql);
        oci_execute($stid);

        $row = oci_fetch_array($stid, OCI_ASSOC);

        $report = ("SELECT R_NUM,R_NAME,ID FROM  report WHERE ID='$id'");
        $stid = oci_parse($connect,$report);
        oci_execute($stid);

        while($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

            echo "<tr>\n";
            foreach ($row as $item) {
                echo" <td><a herf='show_book.php?r_num={$row['R_NUM']}'>".($item !== NULL ? htmlentities($item, ENT_QUOTES) : "&nbsp;"). "</a></td\n>";
        }
        echo "</tr>\n";
    }
sqlplus db501group6/test1234@203.249.87.57:1521/orcl    //disconnect & logoff
    oci_free_statement($stid);
    oci_close($connect);
    ?></body>
            </table>

        <article id="content">
            <section id="main">
                <!-- <img src="main.png" alt="main img" style="width: 800px; height: 605px;" > -->
            </section>
        </article>
        <h2>너는 누구냐</h2>
            <table style="width:90%">
                <tr style="background-color: #798da7">
                    <th style="color: white";>너</th>
                </tr>
                <tr style="text-align: center;">
                     <td></td>
                </tr>


        <footer>
            <img src="address.png" alt="address" >
        </footer>

    </div>
</body>
</html>
