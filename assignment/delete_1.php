<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$sql = "select * from information";

$result = mysqli_query($mysql,$sql);
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$age = $_GET['Age'];
$name = $_GET['name'];
$addr = $_GET['address'];

if($result){
    $sql = "DELETE FROM information WHERE name = '$name' and address = '$addr' and Age = '$age'";
    $result = mysqli_query($mysql,$sql);
}
if(!$android){
    echo("<script>location.href='./HumanInfo2.php';</script>");
}

mysqli_close($mysql);
?>