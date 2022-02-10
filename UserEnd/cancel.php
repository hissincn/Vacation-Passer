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
			<h2>取消云任务</h2>
			<br />
			<span>请输入需要取消云任务的鑫考云账号(手机号)<br />
				取消之后，服务器将不会再自动上报您的体温，请订好闹钟自行上报哦。<br />
				当然，您可以再次提交任务~~</span>
			<br />
			<span><a href="https://xk.hissin.cn/submit.php">我要提交云任务-></a></span>
			<br />
			<br />
		</div>
		<br />
		<div class="row">

			<div class="container w-90">
				<form id="submit-form" action="cancel.php" method="POST" class="form-group">

					<input type="text" placeholder="鑫考云手机号" class="form-control w-100 col-lg-4 m-auto" name="phone" id="phone" autocomplete="off"><br />

					<input type="submit" value="删除" class="btn btn-primary w-100 col-lg-4">

				</form>


				<div style="border: 1px solid #ccc; border-radius: 16px;padding:10px;margin:40px auto 20px auto;display:inline-flex;max-width:572px;">
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
         
              
                <div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:10px auto -80px auto;max-width:572px;">
                    <span style="width:30%;">
                        本服务秉持免费的理念造福广大衡中学子，</br>
                        代码是我一个人写的，服务也是我一个人维护着，</br>
                        一个人肩负着六百多人的打卡使命。</br>
                        我尽力帮助小伙伴们解决问题，听取小伙伴们的意见，</br>
                        有问必答，有建议必听取。</br>
                        开发期间，经常改bug到深夜一两点(白天要写作业)，</br>
                        每天凌晨4点早起查看打卡状态，以确保万无一失，</br>
                        还自费给密码错误的小伙伴们发送短信，</br>
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


if (!empty($_POST['phone'])) {
	$target = '"' . $_POST['phone'] . '"';
	if (getrow("SELECT count(*) FROM users where phone=$target")[0] > 0) {
		getsql("DELETE FROM users where phone=$target");
		echo '<script type="text/javascript">alert("已删除");</script>';
		echo "<script type=\"text/javascript\">window.location='" . $domain . "cancel.php'</script>";
	} else {
		echo '<script type="text/javascript">alert("不存在此用户");</script>';
		echo "<script type=\"text/javascript\">window.location='" . $domain . "cancel.php'</script>";
	}
}



?>



<?php require('footer.php'); ?>