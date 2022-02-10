<?php require('header.php'); ?>
<!-- header pages -->
<div class="header-pages">
	<div class="navbar navbar-expand-md">
		<div class="container">
			<a href="index.php" class="navbar-brand">
				<h2>鑫考云体温自动打卡</h2>
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
			<span>We Are Professional</span>
			<h2>一些帮助及日志</h2>
		</div>
	</div>
</div>

<!-- contact us -->
<div class="contact-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="entry">
					<h5>常见问题</h5><br/>
		
    					<h5>1.打卡信息修改的问题</h5>
    					<ul>宿舍，地址，班主任姓名等信息是根据您的历史打卡信息获取的，如若您想修改信息，请先行取消任务，第二天早上自己打卡修改信息，再提交云任务，这样以后您打卡信息就是您修改了的啦！
    					</ul><br/>
    					
    					<h5>2."貌似"没提交的问题</h5>
    					<ul>
    有用户反馈说查看鑫考云app"体温上报"栏目中体温为空，以为没有打卡成功，其实并不是没有上报成功，其实只是在“体温上报”栏目中没有显示出来而已！可以打开第二个栏目"体温记录"查看是否有当天提交记录[只要是日志上显示“提交成功”或“已提交，不可重复”的，就一定是提交成功的！]<br/>
        <img src="https://xk.hissin.cn/pic/error1.png" height="200px">
                        </ul><br/>
                        
                        <h5>3.获取不到宿舍信息的问题</h5>
                        <ul>
                            因为我们是通过鑫考云获取历史打卡信息的api获取宿舍 班主任 地址 联系方式等信息，所以要保证前一天的信息是正确的，近来发现有些同学提交云任务的前一天没有打卡，就会导致宿舍信息错误。解决方法是第二天先自行打卡，第三天就可以正常自动打卡啦
                        </ul><br/>


				</div>
			</div>
		
			<div class="col-md-6">
				<div class="entry">
				    <h5>4.提交时间的问题</h5>
                        <ul>
                            第一次触发为主服务器触发：4：00
                            第二次为北京腾讯云次服务器API方式触发：4：10
                            第三次为上海天翼云次服务器API方式触发：4：30
                            第四次为我醒了之后查看日志，群里推送，有问题手动触发并联系相关人员
                            群里打卡推送的时间和服务器自动打卡的时间无关
                        </ul></br>
                        
                        <h5>5.鑫考云登录问题</h5>
                        <ul>
                           打卡程序只会在0.001秒内占用你的账号，你可以自由登录鑫考云，“其他设备登录”只是提醒，无视重新登录即可 
                        </ul><br/><br/><br/>


					<h5 style="color:red;">以下同学因密码错误已暂被删除，请重新提交,以后修改密码请先取消云任务</h5><br/>
					<ul>
					    <?php 
					        $pwerror=getall("SELECT phone,date FROM pwerror");
					        foreach ($pwerror as $pwone){
					            echo '<li><i class="fas fa-phone-alt"></i>手机号为'.$pwone[0].'的同学,消失时间:'.$pwone[1].'</li>';
					        }
                         ?>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end contact us -->


<!-- end header pages -->
<center>
	<h2>今天是<?php echo(getLogs()[0]);?></h2>
	<span>“已提交，不可重复”说明是自行提交的打卡</span>
	<br/><br/>
</center>					
<div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:0 auto 40px auto;max-width:572px;">
    <form method="get">
        <input type="input" name="stuname" placeholder="输入姓名快速查询">
        <input type="submit" value="查询">
    </form>
    <br/>
    <span style="width:30%;text-align:left;">
        <?php 
        $logs=explode("|",getLogs()[1]);
        if (!isset($_GET['stuname']) or $_GET['stuname']==null){
            
            foreach ($logs as $one){
                echo $one;
            }
        }
        else {
            $search=0;
            foreach ($logs as $one){
                if(strstr($one, $_GET['stuname'])!=false){
                    echo $one;
                    $search+=1;
                }
            
            }
            if($search==0){
                echo "未查询到您的打卡记录，快去注册打卡任务吧~~（也有可能是密码错误被删除了，重新提交即可）";
            }
        }
        
        
        ?>
    </span>
</div>
		


<div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:10px auto 0 auto;max-width:572px;text-align:left;">
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
                

<center>
    <span>你，心动了吗？  </span>
    <a href="submit.php"><button class="button">开始使用</button></a></center>
<br/><br/><br/><br/>


<?php require('footer.php'); ?>