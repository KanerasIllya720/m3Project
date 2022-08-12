<?php
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$sql = "select * from information";
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$data = array();

$result = mysqli_query($mysql,$sql);
mysqli_close($mysql);
if($android){
    while($row=mysqli_fetch_array($result)){
        array_push($data,array('Age'=>$row['Age'], 'name' => $row['name'], 'address' => $row['address']));
    }
    $json = json_encode($data);
    echo $json;
}
if(!$android){
?>

<html>
<head> <meta charset="utf-8"/> </head>
    <body>
        <table border="1" cellpadding="10">
            <tr align="center">
            <td>Age</td>
            <td>Name</td>
            <td>Address</td>
            <td>Update</td>
        <td>Delete</td>
        
    <? while ($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?=$row[0]?></td>
        <td><?=$row[1]?></td>
        <td><?=$row[2]?></td>
        <td><a href="update_1.php?Age=<?=$row[0]?>&name=<?=$row[1]?>&address=<?=$row[2]?>" onClick = "return confirm('수정하시겠습니까?')">수정하기</a></td>
        <td><a href="delete_1.php?Age=<?=$row[0]?>&name=<?=$row[1]?>&address=<?=$row[2]?>" onClick = "return confirm('삭제하시겠습니까?')">삭제하기</a></td>
        </tr>
        <?
        }
        ?>
        </tr></tr>
    </table>
    <br>
    <body>
        <form action = "insert_1.php" method = "post">
        <div>
            <input type = "text" name = "age" placeholder = "Age"/>
        </div>
        <div>
            <input type = "text" name = "name" placeholder = "Name"/>
        </div>
        <div>
            <input type = "text" name = "addr" placeholder = "Address"/>
        </div>
        <input type = "submit" value = "추가" />
    </body>

</html>
<?}?>