<?php require('header.php'); ?>
<!-- header pages -->
<div class="header-pages">
    <div class="navbar navbar-expand-md">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <h2>鑫考体温自动打卡</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php require('daohang.php'); ?>
            </div>
        </div>
    </div>
    <div class="pages-title">
        <div class="container">
            <h2>提交云任务</h2>
            <span><a href="https://xk.hissin.cn/cancel.php">我要取消云任务-></a></span>
            <br/><br/>
            <span>每天早上5：30分，服务器会帮您自动打卡！</span><br/>
            <span>提交前务必阅读<a href="mianze.php"> 免责声明 </a></span></br>
            <span>提交后请阅读<a href="help.php"> 帮助 </a></span></br>
            <span><a href="log.php"> 点击这里查看每日打卡日志 </a></span><br/><br/>
            
            <br/>
        </div>
        <br/>
        <div class="row">
            <div class="container w-90" id="formfather">
                
                
                
                
                
                <form id="submit-form" action="submit.php" method="POST" class="form-group">

                    <input type="text" placeholder="鑫考云手机号" class="form-control w-100 col-lg-4 m-auto" name="phone" id="phone" autocomplete="off"><br />
                    <input type="text" placeholder="鑫考云密码" class="form-control w-100 col-lg-4 m-auto" name="mm" id="mm" autocomplete="off"><br />
                    <input type="submit" id="onesubmit" value="注册云服务" class="btn btn-primary w-100 col-lg-4">

                </form>
                <?php if (!empty($_POST['phone']) and !empty($_POST['mm'])) {
                    if (ifRepeat($_POST['phone']) == False) { //不重
                        $goPost = examUser($_POST['phone'], $_POST['mm']);
                        $zhuangtai = $goPost["resultCode"];
                        if ($zhuangtai == "0") { //密码正确
                        
                        
                            $textStuChoose = $goPost["data"]["pardt"];
                            $phoneS = '"' . $_POST['phone'] . '"';
                            $pass = '"' . $_POST['mm'] . '"';
                            $id = 0;

                            

                            echo '<form id="chooseStuTab" action = "submit.php" method = "POST"><br/><br/>哪个是您？';
                            foreach ($textStuChoose as $personOne) {
                                echo ' <div class="radio"><label><input type="radio" id="Stulab" name="Stulab" value="' . $id . '" checked>' . $personOne["StuName"] . " " . $personOne["SchoolName"] . '</label></div>';
                                $id++;
                            }
                            echo '<input type="hidden" name="phone" value="' . $_POST['phone'] . '">';
                            echo '<input type="hidden" name="mm" value="' . $_POST['mm'] . '">';
                            echo '<br/>';
                            echo '<input type="submit" value="这个是我" class="btn btn-primary w-100 col-lg-4">';
                            echo "</form>";
                            echo('<script>var child = document.getElementById("submit-form");child.remove();</script>');
                            
                            
                        } else {
                            echo '<script type="text/javascript">alert("您输入的账号或密码错误");</script>';
                            echo "<script type=\"text/javascript\">window.location='" . $domain . "submit.php'</script>";
                        }
                    } else {
                        echo '<script type="text/javascript">alert("您已经提交过此任务了哦！");</script>';
                        echo "<script type=\"text/javascript\">window.location='" . $domain . "submit.php'</script>";
                    }
                }
                ?>







                <div style="border: 1px solid #ccc; border-radius: 16px;padding:10px;margin:40px auto 20px auto;display:inline-flex;max-width:572px;text-align:left;">
                    <div style="margin:10px;width:50%;">
                        <span>新来的小伙伴请务必加群接收推送<br/>
                        QQ②群(745731575)：<a href="https://jq.qq.com/?_wv=1027&k=cPvj2Vft">点击加入</a><br/>
                        QQ①群(满员,非活跃人员勿加)：<a href="https://jq.qq.com/?_wv=1027&k=FLpEj4b8">756016909</a></br>
                        钉钉群(31846657)<a href="https://qr.dingtalk.com/action/joingroup?code=v1,k1,mQvtrGj2v7QyElRcjOGFciRHyuduanL5u+OlefppD64=&_dt_no_comment=1&origin=11">点击加入</a><br/>不加群云任务将会被移除！</span></br>
                        <img src="https://xk.hissin.cn/pic/qqqun.png" height="100px"></br>
                            QQ②群二维码
                    </div>
                    <div style="margin:10px;width:50%;">
                        <span>新增功能：<br/>微信扫下方二维码并关注公众号即可订阅微信每日推送</span></br>
                        <img src="https://xk.hissin.cn/pic/wechatPush.jpg" height="100px">
                        </br></br>注：QQ、钉钉、微信公众号都已集成打卡日志推送
                    </div>
                </div>   
              
                <div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:10px auto -80px auto;max-width:572px;text-align:left;">
                    <span style="width:30%;">
              
                        小伙伴们你们好，</br>
                        我是中区的一名高二学生，</br>
                        此项目本来是自用的，</br>
                        后来看群里总有通报没打卡体温什么的，</br>
                        想到班主任痛苦，家长们也痛苦，</br>
                        就简单写了个网站用于开放服务，</br>
                        代码是我一个人写的，</br>
                        服务也是我一个人维护着，</br>
                        一个人肩负着七百多人的打卡使命。</br>
                        我尽力帮助小伙伴们解决问题，</br>
                        听取小伙伴们的意见，</br>
                        有问必答，有建议必听取。</br>
                        开发期间，经常改bug到深夜一点(白天要写作业)，</br>
                        预上线期间凌晨4点早起查看打卡状态，</br>
                        以确保万无一失，</br>
                        自费给密码错误的小伙伴们发送短信，</br>
                        负担服务器和其他维护费用。</br>
                        </br>
                        So，我可以收点赞助嘛，</br>
                        大家的赞助将会全部用于支付维护费用！</br>
                        来自高二的一只小可爱~~
                        </span></br></br>
                    <img src="https://xk.hissin.cn/pic/wechatShang.png" height="120px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="https://xk.hissin.cn/pic/zhifubao.png" height="120px">
                     
                    
                </div>   
                
                
                
            </div>

        </div>

    </div>



   <!-- counter -->
<?php require('showStatus.php');?>
</div>
<!-- end header pages -->

<?php
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




if (isset($_POST['Stulab'])) {
    $phoneS = '"' . $_POST['phone'] . '"';
    $pass = '"' . $_POST['mm'] . '"';
    $stuc = '"' . $_POST['Stulab'] . '"';
    getsql("INSERT INTO users (phone,password,stunum) VALUES ($phoneS, $pass,$stuc)");
    echo '<script type="text/javascript">alert("已添加任务，后续一定不要修改密码哦，如若必须要改，一定先取消任务再重新提交任务哦！！！");</script>';
    echo "<script type=\"text/javascript\">window.location='" . $domain . "submit.php'</script>";
}





?>


<?php require('footer.php'); ?>