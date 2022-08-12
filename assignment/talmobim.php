<?php
$con = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$sql = "select * from information";
$result = mysqli_query($con,$sql);
$data_array = array();
if($result){
    while($row=mysqli_fetch_array($result)){
        array_push($data_array, array('Age'=>$row[0], 'name'=>$row[1], 'address'=>$row[2]));
    }
    $json = json_encode($data_array);
    echo $json;
}
else{
    echo "SQLerror : "; echo mysqli_error($con);
}
mysqli_close($con);
?>