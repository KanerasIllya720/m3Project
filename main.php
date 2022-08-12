<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

$id = $_GET['ID'];
$password = $_GET['Password'];
$login = false;
$log = $_GET['Log'];
$role = $_GET['Role'];

if(isset($id) && isset($password))  {
    $sql = "SELECT * FROM data WHERE ID='$id' and Password='$password';";    
    $result = mysqli_query($mysql, $sql);

    if($result) $login = true;
    $row = mysqli_fetch_array($result);
}

mysqli_close($mysql); 
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="./css/main.css"/>
        <script>
            function management(){
                role = '<?echo $role?>';
                log = '<?echo $log?>';
                id = '<?echo $id?>' ;
                password = '<?echo $password;?>';
                if(log == 'L') location.href='mResult.php?Role=' + role + '&Log=' + log + '&ID=' + id + '&Password=' + password;
                else alert('로그인을 해주세요');
            }
        </script>
    </head>   
    <body>
        <?if(!$login){?>
            <a href = "mLogin.html" class = "ah1">로그인</a>
            <a href = "mRegister.html" class = "ah2">회원가입</a>
        <?}else{?>
            <span class="txt_hello"><?echo $row[1]?>님 환영합니다</span>
            <a href = "mSetting.php" class = "ah4" onClick = "return confirm('설정으로 들어갈까요?')">설정</a>
            <a href = "main.php" class = "ah3" onClick = "return confirm('로그아웃 하시겠습니까?')">로그아웃</a>
            <?$login = false;}?>
        <span class = "txt txt1">출입관리</span>
        <div class = "box">
            <div class = "box box2 subB1" onclick="management()">
                <img src = "./img/management.png">
                <span class = "txt txt2">관리</span>
            </div>
        </div>
    </body>
</html>