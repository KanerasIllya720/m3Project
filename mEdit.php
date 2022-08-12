<?
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if(!$android) header('Content-Type: text/html; charset=utf-8');
//$mysql = mysqli_connect('192.168.137.97', 'kaneras','darker0720','raspMDP');
$mysql = mysqli_connect('localhost', 'root','apmsetup','mdpprac');
mysqli_set_charset($mysql, 'utf8');

$role = $_GET['Role'];
$id = $_GET['ID'];
$password = $_GET['Password'];
$log = $_GET['Log'];

$sql = "SELECT * FROM data;";
$result = mysqli_query($mysql, $sql);

mysqli_close($mysql); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/mEdit.css"/>
    </head>    
    <script>
        function backButton() {
                var role = '<?echo $role?>';
                var log = '<?echo $log?>';
                var id = '<?echo $id?>' ;
                var password = '<?echo $password;?>';
                if(role == 'adminstrator'){
                    alert("관리창으로 돌아갑니다");
                    location.href = 'mResult.php?Role=' + role + '&Log=' + log + '&ID=' + id + '&Password=' + password;;
                } 
                else alert('권한이 없습니다');
            }
    </script>
    <body>
        <span class="txt txt1">삭제</span>   
        <div class="box box1">
            <table id="table", class="tableCSS">
                <tr>
                    <th>이름</th>
                    <th>ID</th>
                    <th>PASSWORD</th>
                    <th>상태</th>
                    <th>역할</th>
                </tr>
                <tr>
                    <? while ($dataRow = mysqli_fetch_array($result)){?>
                    <tr>
                        <td> <?=$dataRow[1]?> </td>
                        <td> <?=$dataRow[2]?> </td>
                        <td> <?=$dataRow[3]?> </td>
                        <td> <?=$dataRow[5]?> </td>
                        <td> <?=$dataRow[4]?> </td>
                    </tr>
                    <?}?>
                </tr>
            </table>
        </div>
        <input type="button" value="돌아가기" onclick="backButton()" class="buttonCSS btn1"/>

        <script>
            $("#table tr").click(function(){  
                var tr = $(this);
                var td = tr.children();

                var id = td.eq(1).text();
                var pass = td.eq(2).text();

                if(id != "이름" && pass != "PASSWORD"){
                    var qu = confirm("삭제하시겠습니까?");
                    var str = "";

                    str += "mDelete.php?ID=" + encodeURI(id , "UTF-8") + "&Password=" + encodeURI(pass , "UTF-8");
                    str = str.replace("%20","");  
                    str = str.replace("%20","");  
                    str = str.replace("%20","");  
                    str = str.replace("%20","");  

                    if(qu) location.href = str;
                }
            });
        </script>
    </body>
</html>
