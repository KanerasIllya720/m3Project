<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

$sql = "select * from data;";    
$result = mysqli_query($mysql,$sql);

$name = $_POST['Name'];
$id = $_POST['ID'];
$password = $_POST['Password'];
$password2 = $_POST['Password2'];

if($result){
    if(!$android){
        if($name == null){
            echo "<script>alert('이름을 입력하세요'); location.href='mRegister.html';</script>";
        }else if($id == null){
            echo "<script>alert('ID를 입력하세요'); location.href='mRegister.html';</script>";
        }else if($password == null){
            echo "<script>alert('비밀번호를 입력하세요'); location.href='mRegister.html';</script>";
        }else if($password2 == null){
            echo "<script>alert('비밀번호 확인칸을 입력하세요'); location.href='mRegister.html';</script>";
        }else if($password != $password2){
            echo "<script>alert('비밀번호가 맞지 않습니다 다시 입력하세요'); location.href='mRegister.html';</script>";
        }
    }
    $sql = "INSERT INTO data(Name, ID, Password) VALUES('$name', '$id', '$password');";
    $result = mysqli_query($mysql,$sql);
    if (!$result){
        if($android) echo "아이디 또는 비밀번호가 존재합니다!";
        else echo "<script>alert('아이디 또는 비밀번호가 존재합니다!'); location.href='mRegister.html';</script>";
    }
    
    if(!$android) echo "<script>alert('정상적으로 회원가입 되었습니다'); location.href='mLogin.html';</script>";
    else echo "Success";
}else{
    if($android) echo "오류 발생!\n".mysqli_error($mysql);
    else echo "<script>alert('오류 발생!'); location.href='mRegister.html';</script>";
}
mysqli_close($mysql);
?>
