<!DOCTYPE html>
<head> <meta charset="utf-8"/> </head>
<title> 데이터베이스 연동 </title>
</head>
<body>
<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','testdb1');
$sql = "select * from table1";
$result = mysqli_query($mysql,$sql);
$number=1;
?>
<table border="1" cellpadding="10">
<tr align="center">
<td bgcolor="#cccc">번호</td>
<td bgcolor="#cccc">이름</td>
<td bgcolor="#cccc">비밀번호</td>
</tr>
<? while ($row=mysqli_fetch_array($result))
{echo("<tr>
    <td>$number</td>
    <td>$row[name]</td>
    <td>$row[password]</td>
    </tr>");
$number++;
}
mysqli_close($mysql);
?>
</table>
</body>
</html>