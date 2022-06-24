<form action="signup_db.php" method="POST" class="joinForm" onsubmit="DoJoinForm__submit(this); return false;">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="./signup.css"></link>
      </head>
      <header>
        <div id = "logo">
            <img src = "logo.png" alt = "Logo">
        </div>
    </header>
    <style>
      * {
    margin: 0px;
    padding: 0px;
    text-decoration: none;
    font-family:sans-serif;

  }

  body {
    background-image:#34495e;
  }

  .joinForm {
    position:absolute;
    width:400px;
    height:400px;
    padding: 30px, 20px;
    background-color:#FFFFFF;
    text-align:center;
    top:40%;
    left:50%;
    transform: translate(-50%,-50%);
    border-radius: 15px;
  }

  .joinForm h2 {
    text-align: center;
    margin: 30px;
  }

  .textForm {
    border-bottom: 2px solid #adadad;
    margin: 30px;
    padding: 10px 10px;
  }


  .id {
    width: 100%;
    border:none;
    outline:none;
    color: #636e72;
    font-size:16px;
    height:25px;
    background: none;
  }

  .pw {
    width: 100%;
    border:none;
    outline:none;
    color: #636e72;
    font-size:16px;
height:25px;
    background: none;
  }

  .email {
    width: 100%;
    border:none;
    outline:none;
    color: #636e72;
    font-size:16px;
    height:25px;
    background: none;
  }

  .btn {
    position:relative;
    left:40%;
    transform: translateX(-50%);
    margin-bottom: 40px;
    width:80%;
    height:40px;
    background: linear-gradient(125deg,#81ecec,#6c5ce7,#81ecec);
    background-position: left;
    background-size: 200%;
    color:white;
    font-weight: bold;
    border:none;
    cursor:pointer;
    transition: 0.4s;
    display:inline;
  }

  .btn:hover {
    background-position: right;
  }
    </style>
<form action = "signup_db.php" method ="POST" class = "joinForm">
    <h2>SIGN UP</h2>
    <div class="textForm">
      <input name="id" type="text" class="id" placeholder="아이디">
      </input>
    </div>
    <div class="textForm">
      <input name="pw" type="password" class="pw" placeholder="비밀번호">
      </input>
    </div>
    <div class="textForm">
      <input name="re_pw" type="password" class="pw" placeholder="비밀번호 확인">
      </input>
    </div>
    <div class="textForm">
      <input name="user_name" type="text" class="user_name" placeholder="이름">
      </input>
    </div>
    <div class="textForm">
      <input name="email" type="text" class="email" placeholder="이메일">
      </input>
    </div>
    <input type="submit" class="btn" value="J O I N" />
    </input>
</form>
