<!doctype html>
<?php session_start(); ?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="./replece.css"></link>

  </head>
  <body width="100%" height="100%">
    <style>*{
      margin: 0px;
      padding: 0px;
      text-decoration: none;
      font-family:sans-serif;

    }

    body {
      background-image: #34495e;
    }

    .loginForm {
      position:absolute;
      width:300px;
      height:400px;
      padding: 30px, 20px;
      background-color:#FFFFFF;
      text-align:center;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      border-radius: 15px;
    }

    .loginForm h2{
      text-align: center;
      margin: 30px;
    }

    .passForm{
      border-bottom: 2px solid #adadad;
      margin: 30px;
      padding: 10px 10px;
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

    .bottomText {
      text-align: center;
      margin-bottom: 50px;
    }</style>


 <h2>Login</h2>
      <div class="passForm">
        <input type="password" class="pw" placeholder="PW" name="pw">
      </div>
      <button type="submit" class="btn" onclick="button()">
        SUBMIT
      </button>
      <header>
        <div id = "logo">
            <img src = "logo_2.png" alt = "Logo">
        </div>
    </form>
  </body>
</html>
