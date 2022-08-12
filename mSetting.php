<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

mysqli_close($mysql); 
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="./css/mSetting.css"/>
    </head>    
    <body>
    </body>
</html>
