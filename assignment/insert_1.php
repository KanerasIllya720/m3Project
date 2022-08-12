<?
$mysql = mysqli_connect('localhost', 'root','apmsetup','select_data02');
$sql = "select * from information";

$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$result = mysqli_query($mysql,$sql);

$age = $_POST['Age'];
$name = $_POST['name'];
$addr = $_POST['address'];
$dec = false;

if(!($age==null)&&!($name==null)&&!($addr==null)) $dec = true;
else $dec = false;

if($result&&$dec){
    $sql = "INSERT into information(Age,name,address) values('$age','$name','$addr')";
    $result = mysqli_query($mysql,$sql);
}
if(!$android){
    echo("<script>location.href='./HumanInfo2.php';</script>");
}

mysqli_close($mysql);
?>