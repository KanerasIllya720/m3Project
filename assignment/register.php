<head>
<meta charset="utf-8"/>
</head>
<?php
    $mysql = mysqli_connect("localhost","root","apmsetup","exam01");
    $query = "select * from data";
    $result = mysqli_query($mysql,$query);
    mysqli_close($mysql);
?>
<html>
    <form action="register2.php" method="post">
    <style>
        @charset "utf-8";
        #title{
            color:#000000; 
            font-size: 30px; 
            margin-top: 20px; 
        }
        .input{
            font-size: 15px; 
            height: 30px; 
            width: 400px;
        }
        #button{
            height: 50px; 
            width: 150px; 
            background-color: #050099;
            color: white; 
            font-size: 16px; 
            border: solid 1px #050099;
        }
    </style>
    <h4 id="title">회원가입</h4>
    <fieldset>
        <label>아이디 입력</label>
        <input class="input" type="text" name="id" placeholder = "사용할 아이디를 입력해주세요"><br><br>
        <label>비밀번호 입력</label>
        <input class="input" name="pw" type="password" placeholder = "사용할 비밀번호를 입력해주세요"><br><br>
        <label>이메일 입력</label>
        <input type="text" name="em1">@<select name="em2">
            <option value="">직접입력</option>
            <option value="gmail.com">gmail.com</option>
            <option value="naver.com">naver.com</option>
            <option value="daum.net">daum.net</option>
        </select><br><br>
        성별구분<input type="radio"value="1" name="sex">남자/<input type="radio"value="2" name="sex">여자<br><br>
        <input type="submit" value="회원가입" id="button" onClick="return confirm('회원가입하시겠습니까?')">
</html>
