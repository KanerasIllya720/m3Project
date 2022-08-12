<head>
<meta charset="utf-8"/>
</head>
<?php
    $id = $_POST['id'];
    $pass = $_POST['pw'];

    $mysql = mysqli_connect("localhost","root","apmsetup","exam01");
    $query = "select * from data";
    $result = mysqli_query($mysql,$query);
    if($result && $id == null && $pass == null){
        echo ("<script> alert('아이디나 비밀번호를 입력하세요'); location.href='login.php';</script>");
    }else{
        
    }
?>
<html>
    <body>
        <table border = "1" cellpadding="10">
            <tr>
                <td>번호</td>
                <td>아이디</td>
                <td>비밀번호</td>
                <td>이메일1</td>
                <td>이메일2</td>
                <td>성별</td>
            </tr>
            <tr>
                <? while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <?
                    if($row[1]==$id && $row[2]==$pass){
                    ?>
                    <td> <?=$row[0]?></td>
                    <td> <?=$row[1]?></td>
                    <td> <?=$row[2]?></td>
                    <td> <?=$row[3]?></td>
                    <td> <?=$row[4]?></td>
                    <td> <?=$row[5]?></td>
                    <?}?>
                </tr>
                
                <?}?>
                </tr>
                </table>
    </body>
</html>