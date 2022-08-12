<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','insert_data01');
$sql = "select * from person";

$str = "Data UpDate";
$strr = "Result";
$result = mysqli_query($mysql,$sql);
$name = $_POST[name];
$dec = false;
$android = strpos($_SERVER['HTTP_USER_AGENT'], 'Android');

if($result){
    $sql = "UPDATE person set name = '$name', address = '$name' where id is not null";
    $strr = "SQL success";
    $result = mysqli_query($mysql,$sql);
}
else if($result == false) $strr = "SQL ERROR";

if(!android){
    echo $str;
}

mysqli_close($mysql);
if(!$android){
?> 

<html>
 <head> <meta charset="utf-8"/> </head>
</head>
    <body>
        <form action = "<?php $_PHP_SELF ?>" method = "post">
        <div>
            Name: <input type = "text" name = "name"  />
            <input type = "submit" value = "쿼리 전송" />
        </div>
    </body>
</html>
<?}
echo $strr;
?>