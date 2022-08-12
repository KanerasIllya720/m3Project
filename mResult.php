<?
$log = $_GET['Log'];
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if($log != 'L' && !$android) echo "<script>alert('로그인을 해야합니다'); location.href='main.php';</script>";
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

$role = $_GET['Role'];
$id = $_GET['ID'];
$password = $_GET['Password'];

$sql = "SELECT * FROM data WHERE Status = 'in';";    
$result = mysqli_query($mysql, $sql);
$status = mysqli_num_rows($result);

$sql = "SELECT * FROM data;";
$result = mysqli_query($mysql, $sql);

mysqli_close($mysql); 
if(!$android){
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="./css/mResult.css"/>
        <script>
            function adminButton() {
                var role = '<?echo $role?>';
                var log = '<?echo $log?>';
                var id = '<?echo $id?>' ;
                var password = '<?echo $password;?>';
                if(role == 'adminstrator'){
                    alert("관리창으로 넘어갑니다");
                    location.href = 'mEdit.php?Role=' + role + '&Log=' + log + '&ID=' + id + '&Password=' + password;;
                } 
                else alert('권한이 없습니다');
            }
            function backButton() {
                var role = '<?echo $role?>';
                var log = '<?echo $log?>';
                var id = '<?echo $id?>' ;
                var password = '<?echo $password;?>';
                alert("메인화면으로 이동합니다");
                location.href = 'main.php?Role=' + role + '&Log=' + log + '&ID=' + id + '&Password=' + password;;

            }
        </script>
    </head>
    <body>
        <span class="txt mainText1">현재 인원</span>
        <div class="box box1">
            <span class="txt subText1"><?echo $status;?></span>
        </div>
        <span class="txt mainText2">시간</span>
        <div class="box box2">
            <table class="tableCSS">
                <tr>
                    <th>이름</th>
                    <th>입장시간</th>
                    <th>퇴장시간</th>
                </tr>
                <tr>
                    <? while ($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <th> <?=$row[1]?></th>
                        <td> <?=$row[7]?></td>
                        <td> <?=$row[8]?></td>
                    </tr>
                    <?}?>
                </tr>
            </table>
        </div>
        <input type="button" value="삭제" onclick="adminButton()" class="buttonCSS btn1"/>
        <input type="button" value="돌아가기" onclick="backButton()" class="buttonCSS btn2"/>
    </body>
</html>
<?}?>