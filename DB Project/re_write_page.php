<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./site.css" media="(min-width:600px)"></link> -->
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
                <img src="logo.png" alt="Logo" style="position:absolute; width:70px; height:70px; top:0px; left:0px;">
            </div>

            <div id="top_menu">
                <a href="site.php">HOME</a> |
                <a href="login.php">LOGIN</a> |
           <a href="signup.php">SIGN UP</a> |
                <a href="mypage.php">MY PAGE</a>
            </div>

            <form action = "re_write.php" method = "POST"  style="position:absolute; width:55px; top:300px; left:300px;" >
        책 제목 : <input type = "text" placeholder = "책 제목" name = "b_name"/><br/>
            글 제목 : <input type = "text" placeholder = "제목"  name = "r_name"/><br/>
           작성자 : <input type = "text" placeholder = "작성자"  name = "id"/><br/>
            <input type = "text" placeholder = "내용"  name = "content"/><br/>
            <button type = "submit" onclick="button()">저장</button>
            </form>
   <script>
                function formCheck(){
                        var r_name = document.forms[0].r_name.value;
                        var id = document.forms[0].id.value;
                        var content = document.forms[0].content.value;

                        if(r_name == null || r_name == ""){
                                alert('제목을 입력하세요');
                                document.forms[0].r_name.focus();
                                return false;
                        }
                        if(id == null || id == ""){
                                alert('작성자를 입력하세요');
                                document.forms[0].ID.focus();
                                return false;
                        }
                <br>
                        if(content == null || content == ""){
                                alert('내용을 입력하세요');
                                document.forms[0].content.focus();
                                return false;
                        }
                }
            </script>

            <nav>
                <ul>
                    <li><a href="book.php">BOOK</a></li>
                    <li><a href="bookreport.php">BOOK REPORT</a></li>
                    <li><a href="monthbook.php">MONTHLY BOOK</a></li>
                </ul>
            </nav>
        </header>

        <footer>
            <img src="address.png" alt="address" >
        </footer>

    </div>
</body>
</html>

