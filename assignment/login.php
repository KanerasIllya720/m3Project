<head>
<meta charset="utf-8"/>
</head>
<?php
    $mysql = mysqli_connect("localhost","root","apmsetup","exam01");
    $query = "select * from data";
    $result = mysqli_query($mysql,$query);
?>
<html>
    <form action="loginP.php" method="post">
<head>
    <style>
        @charset "utf-8";
        body{
            background-color: #ebef00; 
            text-align: center;
        }
        #title{
            color:#050099; 
            font-size: 70px; 
            margin-top: 40px; 
            font-family: 굴림;
        }
        .input{
            font-size: 20px; 
            height: 40px; 
            width: 430px;
        }
        #button{
            height: 50px; 
            width: 430px; 
            background-color: #050099;
            color: white; 
            font-size: 16px; 
            border: solid 1px #050099;
        }
        #link{
            height: 50px; 
            width: 430px; 
            font-size: 30px;
        }
    </style>
    <body>
        <div id="title">LOGIN</div>
        <br>
        <input class="input" type="text" name="id" placeholder="아이디를 입력하세요">
        <br><br>
        <input class="input" type="password" name="pw" placeholder="비밀번호를 입력하세요">
        <br><br>
        <input id="button" type="submit" value="로그인">
        <br><br>
        <a id="link" href="register.php">회원가입</a>
    </body>
</head>
</html>