<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$age = $_GET[Age];

$qurry = "SELECT * FROM information where name = '$name' and address = '$addr' and Age = '$age'";
$result = mysqli_query($mysql,$qurry);
$row=mysqli_fetch_array($result);
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql = "select * from information";
$result = mysqli_query($mysql,$sql);

mysqli_close($mysql);
if($android){
?> 

<html>
<head> <meta charset="utf-8"/> </head>
    <body>
        <form action = "update_2.php" method = "post">
        <body>
        <table cellpadding="3">
            <tr>
                <td>Name</td>
                <td>Address</td>
            </tr>
            <tr>
                <td>
                    <input type = "hidden" value = "<?=$row[0]?>" name="age"/>
                </td>
                <td>
                    <input type = "text" value = "<?=$row[1]?>"name = "name"/>
                </td>
                <td>
                    <input type = "text" value = "<?=$row[2]?>" name = "address"/>
                </td>
                <td>
                    <input type = "submit" value = "수정하기"/>
                </td>

    </body>
</html>
<?}?>