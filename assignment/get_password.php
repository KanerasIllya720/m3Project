<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data01');
$sql = "select * from data_table01";
$result = mysqli_query($mysql,$sql);
$data_array = mysqli_fetch_array($result);

if(($_GET[username]==$data_array[Username]) && ($_GET[password]==$data_array[Password]))
    echo "$data_array[Role]";
else
    echo "Invalid qurry";
mysqli_close($mysql);
?>
