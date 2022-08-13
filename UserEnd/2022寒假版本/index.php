<?php require('header.php');?>
<body>
		<script>alert('小伙伴们请尽快加群获取打卡推送\nQQ一群:756016909(群满暂停加入，除非你是活跃人员)\nQQ二群(请加入此群)：745731575\n钉钉群(欢迎加入)：31846657\n不加群云任务将会被移除！');</script>
		<!-- header intro -->
		<div class="header-intro">
			<div class="navbar navbar-expand-md">
				<div class="container">
					<!--<a href="index.php" class="navbar-brand"><h2>鑫考云体温自动上报</h2></a>-->

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<?php require('daohang.php');?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row align-items-center">
				    
					<div class="col-md-6 col-sm-12">
					    <span></span>
						<div class="entry" data-aos="slide-up">
							<span>拯救你的懒觉</span>
					
							<h2>鑫考体温自动打卡</h2>
							<p>你好，打工人！<br/>
                            假期来临，你是否还在苦苦早起打卡体温？<br/>你是否想睡一个没有打扰的懒觉？<br/>
                            欢迎使用鑫考云体温自动上报云服务，每天早上5：30分，服务器会帮您自动打卡！<br/>
							务必加入QQ群 745731575 获取最新信息及推送，不加群云任务将会被移除！</p>
							
							<a href="submit.php"><button class="button">开始使用</button></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="entry entry-img" data-aos="zoom-in">
							<img src="static/picture/hero.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header intro -->

		<!-- services -->
		<div class="services section">
			<div class="container">
				<div class="title-section">
					<span>介绍</span>
					<h2>记得分享给身边的小伙伴哦！</h2>
				</div>
				<div class="row first-row">
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in">
							<i class="fab fa-wordpress"></i>
							<h5>安全</h5>
							<p>本服务完全免费，我们保证您账号的安全</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in" data-aos-duration="1500">
							<i class="fab fa-magento"></i>
							<h5>真实</h5>
							<p>随机体温区间为36.0-36.6</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in" data-aos-duration="1500">
							<i class="fab fa-drupal"></i>
							<h5>原理</h5>
							<p>原理为抓包分析API，服务器自动向鑫考云获取Token及提交POST请求实现。</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in" data-aos-duration="2000">
							<i class="far fa-chart-bar"></i>
							<h5>开源</h5>
							<p>如需要源码，请联系hissin'</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in" data-aos-duration="2500">
							<i class="fas fa-mobile-alt"></i>
							<h5>提示</h5>
							<p>提交后第一天建议先别睡懒觉，去鑫考云检查一下是否成功打卡！！！</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry" data-aos="zoom-in" data-aos-duration="3000">
							<i class="fas fa-credit-card"></i>
							<h5>注意</h5>
							<p>请输入您的鑫考云账号（手机号）和密码，若鑫考云提示"您的账户已在其他设备上登录"为服务器自动操作，无需担心，如有鑫考云使用需要，再次登录即可，不影响打卡服务。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end services -->


<?php require('showStatus.php');?>
<?php require('friends.php');?>
<center>
    <span>你，心动了吗？  </span>
    <a href="submit.php"><button class="button">开始使用</button></a></center>
<br/><br/><br/><br/>
<!-- end why us -->
		
		<!-- end counter -->
		
		<!-- about us 
		<div class="about-us section">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="entry">
							<img src="static/picture/about-us.png" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="entry">
							<span>有在心动？</span>
							<h2>还在等什么！</h2>
							
							<a href="submit.php"><button class="button">立即提交云任务</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		 end about us -->

		

	<!-- pricing 
		<div class="pricing">
			<div class="container">
				<div class="title-section">
					<span>Pricing</span>
					<h2>Choose our<br>pricing plans</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="entry">
							<h5>Start</h5>
							<h3>$50</h3>
							<ul>
								<li><span>Responsive</span></li>
								<li><span>Creative</span></li>
								<li><span>Clean Design</span></li>
								<li><span>Documentation</span></li>
								<li><span>Update</span></li>
								<li><span>Free Support</span></li>
							</ul>
							<button class="button pricing-button">Get Now</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry entry-center">
							<h5>Medium</h5>
							<h3>$70</h3>
							<ul>
								<li><span>Responsive</span></li>
								<li><span>Creative</span></li>
								<li><span>Clean Design</span></li>
								<li><span>Documentation</span></li>
								<li><span>Update</span></li>
								<li><span>Free Support</span></li>
							</ul>
							<button class="button">Get Now</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="entry">
							<h5>Expert</h5>
							<h3>$90</h3>
							<ul>
								<li><span>Responsive</span></li>
								<li><span>Creative</span></li>
								<li><span>Clean Design</span></li>
								<li><span>Documentation</span></li>
								<li><span>Update</span></li>
								<li><span>Free Support</span></li>
							</ul>
							<button class="button pricing-button">Get Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	 end pricing -->
		
		<?php require('footer.php');?>	