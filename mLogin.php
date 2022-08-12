<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');

$id = $_POST['ID'];
$password = $_POST['Password'];
$log = $_POST['Log'];

if($id == null){
    if(!$android) echo "<script>alert('ID가 공백입니다'); location.href='mLogin.html';</script>";
    else echo "error";
} 
if($password == null){
    if(!$android) echo "<script>alert('비밀번호가 공백입니다'); location.href='mLogin.html';</script>";
    else echo "error";
} 

$sql = "SELECT * FROM data WHERE ID='$id';";    
$result = mysqli_query($mysql, $sql);

if(mysqli_num_rows($result)==1){
    $sql = "SELECT * FROM data WHERE ID='$id' and Password='$password';";
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) == 1){
        if(!$android){
            if($row[4] == 'adminstrator'){
                echo "<script>alert('로그인 되었습니다'); location.href='main.php?Role=$row[4]&Log=$log&ID=$id&Password=$password';</script>";
            }else{
                echo "<script>alert('로그인 되었습니다'); location.href='main.php?Log=$log&ID=$id&Password=$password';</script>";
            }
        } 
        else echo "Login Success";
    }else{
        if(!$android) echo "<script>alert('비밀번호가 일치하지 않습니다.'); location.href='mLogin.html';</script>";
        else echo "error";
    }
}else{
    if(!$android) echo "<script>alert('아이디가 존재하지 않습니다.'); location.href='mLogin.html';</script>";
    else echo "error";
}

mysqli_close($mysql);
?>