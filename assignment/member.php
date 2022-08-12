<!DOCTYPE html>
<html>
 <head> <meta charset="utf-8"/> </head>
 <title> FORM 태그를 이용한 회원 가입 </title>
</head>
<body>
<?php
echo "<h3> ☞ 폼에 입력된 정보를 POST 방식으로 웹브라우저에 출력 ☜ </h3>";
echo "<hr>";
echo "아이디.......<b>{$_POST[id]} </b> <br />";
echo "비밀번호......<b>{$_POST[pw]} </b> <br />";
echo "이 름......<b>{$_POST[name]} </b> <br />";
echo "이메일........<b>{$_POST[email1]}@{$_POST[email2]} </b> <br />";
echo "<hr>";
?>
</body>
</html>