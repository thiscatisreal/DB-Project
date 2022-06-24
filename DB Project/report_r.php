<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <title>Book</title>

    <link rel="stylesheet" href="mypage.css" media="(min-width:600px)"></link>
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
                    <li><a href="list.php">BOOK</a></li>
                    <li><a href="report.php">BOOK REPORT</a></li>
                    <li><a href="monthbook.php">MONTHLY BOOK</a></li>
                </ul>
            </nav>

        </header>

         <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />
</div>
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
