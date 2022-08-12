<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$age = $_POST[Age];
$name = $_POST[name];
$addr = $_POST[address];
$nums = $_POST['No'];

$sql = "select * from information";
$result = mysqli_query($mysql,$sql);
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

if($result){
    if($android){
        $sql = "UPDATE information SET name = '$name', address = '$addr', Age = '$age' Where No = '$nums'";
        $result = mysqli_query($mysql,$sql); 
    }
    else if(!$android){
        $sql = "UPDATE information SET name = '$name', address = '$addr' Where Age = '$age'";
        $result = mysqli_query($mysql,$sql); 
        echo("<script>location.href='./HumanInfo2.php';</script>");
    }
    
}else{
    echo "error";
}

mysqli_close($mysql);
?> 