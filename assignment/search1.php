<?php
$mysql = mysqli_connect('127.0.0.1', 'root','apmsetup','select_data02');
$sql = "select * from information";
$result = mysqli_query($mysql,$sql);

$name = isset($_POST['name']) ? $_POST['name']:'';
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
if($name != ""){
    $sql = "select * from information where address = '$name'";
    $result = mysqli_query($mysql,$sql);
    $data = array();
    if($result){
        $row_address = mysqli_num_rows($result);
        if ($row_address == 0){
            array_push($data,array('Age'=>'0', 'name'=>'N', 'address'=>$name));
            echo "'";
            echo $name;
            echo "'은 찾을 수 없습니다.";
            if(!$android){
                echo "<pre>";
                print_r($data);
                echo "</pre>";
            }else{
                $json = json_encode($data);
                echo $json;
            }
        }else{
            while($row=mysqli_fetch_array($result)){
                array_push($data,array('Age'=>$row['Age'], 'name' => $row['name'], 'address' => $row['address']));
            }
            if(!$android){
                echo "<pre>";
                print_r($data);
                echo "</pre>";
            }else{
                $json = json_encode($data);
                echo $json;
            }
        }
    }else{
        echo "SQL문 처리중 에러 발생\n";
        echo mysqli_error($mysql);
    }
}else{
    echo "검색할 주소를 입력하세요";
}

mysqli_close($mysql);
?> 