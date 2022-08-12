<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','insert_data01');
$sql = "select * from person";
$strr = "data input";

$result = mysqli_query($mysql,$sql);
$name = $_POST[name];
$addr = $_POST[address];
$dec = false;
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

if(!($name==null)&&!($addr==null)) $dec = true;
else $dec = false;

if($result && $dec){
    $sql = "INSERT into person(name,address) values('$name', '$addr')";
    $strr = "SQL success";
    $result = mysqli_query($mysql,$sql);
}
else if($result == false) $strr = "SQL ERROR";

echo $strr;
mysqli_close($mysql);
if (!$android){
?>

<html>
 <head> <meta charset="utf-8"/> </head>
</head>
    <body>
        <form action = "<?php $_PHP_SELF ?>" method = "post">
        <div>
            Name: <input type = "text" name = "name"  />
            Address: <input type = "text" name = "address" />
            <input type = "submit" value = "쿼리 전송" />
        </div>
    </body>
</html>
<?}?>