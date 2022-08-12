<!DOCTYPE html>
<head> <meta charset="utf-8"/> </head>
<title> 나루토와 사스케 싸움수준 레알 실화냐 </title>
</head>
<body>
<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','insert_data01');
$sql = "select * from person";
$result = mysqli_query($mysql,$sql);
?>
<html>
<meta charset="utf-8"/>
    <body>
        <form action="<?php $_PHP_SELF ?>" method="POST">
        주소 이름: <input type = "text" name="country"/>
        <input type = "submit" value="검색"/>
        </form>
    </body>
</html>