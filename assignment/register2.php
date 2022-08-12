<head>
<meta charset="utf-8"/>
</head>
<?php
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $em1 = $_POST['em1'];
    $em2 = $_POST['em2'];
    $sex = $_POST['sex'];
    $sex2 = "";

    $mysql = mysqli_connect("localhost","root","apmsetup","exam01");
    $query = "select * from data";
    $result = mysqli_query($mysql,$query);
    $insert = "";
    if($result && isset($id) && isset($pw) && isset($em1) && isset($em2) && isset($sex)){
        if($sex=="1"){
            $sex2="man";
        }else{
            $sex2="woman";
        }
        $insert = "INSERT into data(id,password,email1,email2,sex) values('$id','$pw','$em1','$em2','$sex2')";
        mysqli_query($mysql,$insert);
        echo ("<script> alert('회원가입되었습니다. 로그인 하세요!'); location.href='login.php';</script>");
    }else{
        echo ("<script> alert('회원가입이 실패하셨습니다. 다시시도해주세요'); location.href='register.php';</script>");
    }
    mysqli_close($mysql);
?>