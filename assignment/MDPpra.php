<head> <meta charset="utf-8"/> </head>
<title>MDP연습</title>
</head>
<body>
<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','insert_data01');
$sql = "select * from person";

$str = "Data UpDate";
$result = mysqli_query($mysql,$sql);
$name = $_POST[name];
$dec = false;

if($result){
    $sql = "UPDATE person set name = '$name', address = '$name' where id is not null";
    $result = mysqli_query($mysql,$sql);
}

echo $str;
mysqli_close($mysql);
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