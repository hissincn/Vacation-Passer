<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";


global $servername, $username, $password, $dbname;
$conn = mysqli_connect($servername, $username, $password, $dbname);
global $conn;
function getall($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_all(mysqli_query($conn, $sql_order));
    return $sql_result;
}
function getarray($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_array(mysqli_query($conn, $sql_order));
    return $sql_result;
}
function getsql($sql_order)
{
    global $conn;
    $sql_result = mysqli_query($conn, $sql_order);
    return $sql_result;
}
function getrow($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_row(mysqli_query($conn, $sql_order));
    return $sql_result;
}
function getassoc($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_assoc(mysqli_query($conn, $sql_order));
    return $sql_result;
}
function getfield($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_field(mysqli_query($conn, $sql_order));
    return $sql_result;
}

function countUseNum()
{
    return getrow("SELECT count(*) FROM users")[0];
}
function runDay()
{
    return round((strtotime(date("Y-m-d")) - strtotime("2022-7-15")) / 3600 / 24);
}

$domain = "https://temp.hissin.cn/";

function getLogs()
{
    return getrow("SELECT * FROM log order BY date DESC limit 1");
}

function freecon()
{
    global $conn;
    mysqli_close($conn);
}
function ifRepeat($phone)
{
    $phone = '"' . $phone . '"';
    if (getrow("SELECT count(*) FROM users WHERE phone=$phone")[0] > 0) {
        return True;
    } else {
        return False;
    }
}



function examUser($phone, $mm)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://usr.xinkaoyun.com/api/HSCPC/Login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'userName=' . $phone . '&password=' . $mm,
        CURLOPT_HTTPHEADER => array(
            'User-Agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}

function submiting()
{
    if (!empty($_POST['phone']) and !empty($_POST['mm'])) {
        if (ifRepeat($_POST['phone']) == False) { //不重
            $goPost = examUser($_POST['phone'], $_POST['mm']);
            $zhuangtai = $goPost["resultCode"];
            if ($zhuangtai == "0") { //密码正确


                $textStuChoose = $goPost["data"]["pardt"];
                $phoneS = '"' . $_POST['phone'] . '"';
                $pass = '"' . $_POST['mm'] . '"';
                $id = 0;
                
                
                echo '<form id="chooseStuTab" action = "index.php" method = "POST">哪个是您？';
                foreach ($textStuChoose as $personOne) {
                    echo ' <div class="radio"><label><input type="radio" id="Stulab" name="Stulab" value="' . $id . '" checked>' . $personOne["StuName"] . " " . $personOne["SchoolName"] . '</label></div>';
                    $id++;
                }
                echo '<input type="hidden" name="phone" value="' . $_POST['phone'] . '">';
                echo '<input type="hidden" name="mm" value="' . $_POST['mm'] . '">';
                echo '<br/>';
                echo '<input type="submit" value="这个是我" class="btn btn-primary w-100 col-lg-4">';
                echo "</form>";
                echo ('<script>var child = document.getElementById("submit-form");child.remove();</script>');

            } else {
                echo '<script type="text/javascript">alert("账号或密码错误");</script>';
                echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
                
            }
        } else {
            echo '<script type="text/javascript">alert("您已经注册服务了！");</script>';
            echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
        }
    }
}
function logChecking()
{
    $logs = explode("|", getLogs()[1]);
    if (!isset($_GET['stuname']) or $_GET['stuname'] == NULL) {
        echo "请输入姓名";
    } elseif (isset($_GET['stuname'])) {
        $search = 0;
        foreach ($logs as $one) {
            if (strstr($one, $_GET['stuname']) != false) {
                echo $one;
                $search += 1;
            }
        }
        if ($search == 0) {
            echo "未查询到您的打卡记录或因密码错误被删除";
        }
    }
}




function sign()
{
    if (isset($_POST['Stulab'])) {
        $phoneS = '"' . $_POST['phone'] . '"';
        $pass = '"' . $_POST['mm'] . '"';
        $stuc = '"' . $_POST['Stulab'] . '"';

        if (isHistory($_POST['phone'],$_POST['mm'],$_POST['Stulab']) === 1){
            getsql("INSERT INTO users (phone,password,stunum) VALUES ($phoneS, $pass,$stuc)");
            echo '<script type="text/javascript">alert("成功注册，请阅读剩余页面并加群");</script>';
            echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
        }
        else{
            echo '<script type="text/javascript">alert("没有打卡历史记录！请明日自行打卡，然后就有历史记录了，届时再注册此服务");</script>';
            echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
        }
        
    
        
        
    }
}
function isHistory($phone,$mm,$stuc)
{
    $goPost=examUser($phone,$mm);
    $schoolId = $goPost["data"]["pardt"][$stuc]['SchoolId'];
    $student_id = $goPost["data"]["pardt"][$stuc]['StudyCode'];
    $student_name = $goPost["data"]["pardt"][$stuc]['StuName'];


    $ch = curl_init();
    $push='schoolId=' . urlencode($schoolId) . '&student_id=' . urlencode($student_id). '&student_name=' . urlencode($student_name).'';


    curl_setopt($ch, CURLOPT_URL, 'https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$push );
    $curl_header = array("content-type: application/x-www-form-urlencoded;charset=UTF-8");
    curl_setopt($ch,CURLOPT_HTTPHEADER,$curl_header);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    
    //$qqqq=json_decode($result, true)['msg'];
    //echo "<script>alert('{$qqqq}')</script>";
    $resultHistory = json_decode($result, true);
    if($resultHistory['msg']==="返回数据正常" && $resultHistory['data']['address']!= null){
        
        return 1;
    }
    else{
        return 0;
    }


}

function remove()
{
    if (!empty($_POST['removePhone'])) {
        $target = '"' . $_POST['removePhone'] . '"';
        if (getrow("SELECT count(*) FROM users where phone=$target")[0] > 0) {
            getsql("DELETE FROM users where phone=$target");
            echo '<script type="text/javascript">alert("已删除");</script>';
            echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
        } else {
            echo '<script type="text/javascript">alert("不存在此用户");</script>';
            echo "<script type=\"text/javascript\">window.location='" . $domain . "index.php'</script>";
        }
    }
}
