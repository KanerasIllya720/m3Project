<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

$sql = "SELECT * FROM data";
$result = mysqli_query($mysql, $sql);

$id = $_GET['ID'];
$password = $_GET['Password'];
$role = $_GET['Role'];
$log = $_GET['Log'];

if($result)
$sql = "DELETE FROM data WHERE ID='$id' and Password='$password';";
$result = mysqli_query($mysql, $sql);
if($result) echo "<script>alert('삭제되었습니다'); location.href='mEdit.php?Role=' + $role + '&Log=' + $log + '&ID=' + $id + '&Password=' + $password;';</script>";

mysqli_close($mysql); 
?>
