<?php require('function.php'); ?>
<!DOCTYPE html>
<html lang="zn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>暑假绿卡</title>
    <link rel="stylesheet" href="static/css/fontawesome.min.css">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/animate.css">
    <link rel="stylesheet" href="static/css/bootstrap-dropdownhover.min.css">
    <link rel="stylesheet" href="static/css/aos.css">
    <link rel="stylesheet" href="static/css/style.css">
    <meta itemprop="name" content="暑假绿卡">
    <meta name="description" itemprop="description" content="为衡中小伙伴提供免费体温打卡服务" />
    <meta itemprop="image" content="https://hissin.cn/800.png">
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?260926ff1f06897d330cad18c2ace081";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<!-- header pages -->
<div class="header-pages">
    <div class="navbar navbar-expand-md">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <h2>暑假绿卡</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
            
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="https://hissin.cn">hissin'</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.cnblogs.com/gbczz">Czz</a>
                    </li>
                    -->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://geekpara.com/"><img src="https://temp.hissin.cn/pic/geekpara.png" height="20px"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="pages-title">
        <div class="row">
            <div class="container w-90" id="formfather">



                <div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:0 auto 20px auto;max-width:572px;">
                    <h3>服务注册</h3><br />
                    <!-- <span>代打卡时间：北京时间06：00</span>-->
                    <form id="submit-form" action="index.php" method="POST" class="form-group">
                        <input type="text" placeholder="鑫考云手机号" class="form-control w-100 col-lg-6 m-auto" name="phone" id="phone" autocomplete="off"><br />
                        <input type="text" placeholder="鑫考云密码" class="form-control w-100 col-lg-6 m-auto" name="mm" id="mm" autocomplete="off"><br />
                        <input type="submit" id="onesubmit" value="下一步" class="btn btn-primary w-100 col-lg-6">
                        <br />
                    </form>

                    <?php submiting(); ?>
                    
                    <span><button class="btn" data-toggle="modal" data-target="#about" id="about-show">使用必读</button></span>
                    <span><button class="btn" data-toggle="modal" data-target="#helps">帮助</button></span>
                    <span><button class="btn" data-toggle="modal" data-target="#right-less">免责声明</button> </span>
                    <span><button class="btn" data-toggle="modal" data-target="#removing">取消服务</button></span>
                    <span><button class="btn" data-toggle="modal" data-target="#lan">福利/烂活</button></span>
                </div>

                <div style="border: 1px solid #ccc; border-radius: 16px;padding:10px;margin:0px auto 20px auto;display:inline-flex;max-width:572px;text-align:left;">
                    <div style="margin:10px;width:50%;">
                        <span>新来的小伙伴请务必加群接收推送<br />
                            QQ②群：<a href="https://jq.qq.com/?_wv=1027&k=cPvj2Vft">745731575</a><br />
                            QQ①群：<a href="https://jq.qq.com/?_wv=1027&k=FLpEj4b8">756016909</a></br>
                            DingTalk：<a href="https://qr.dingtalk.com/action/joingroup?code=v1,k1,mQvtrGj2v7QyElRcjOGFciRHyuduanL5u+OlefppD64=&_dt_no_comment=1&origin=11">31846657</a><br />
                            
                            订阅微信推送请微信扫描下方：
                            <img src="https://temp.hissin.cn/pic/wechat.jpeg" height="100px">
                            
                        </span>

                    </div>
                    <div style="margin:10px;width:50%;">
                        <span style="color:red">开发维护不易，立即成为赞助者：</span><br/><img src="pic/reward.png" height='100px'>
                    </div>

                </div>


                <div style="border: 1px solid #ccc; border-radius: 16px;padding:20px;margin:0 auto 40px auto;max-width:572px;">
                    <h3>打卡记录</h3><br>
                    <form method="get">
                        <input type="input" name="stuname" placeholder="输入姓名快速查询">
                        <input type="submit" value="查询">
                    </form>
                    <br />
                    <span style="width:30%;text-align:left;">
                        <?php logChecking(); ?>
                    </span>
                </div>

            
            </div>

        </div>

    </div>




    <div class="modal fade" id="right-less" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        免责声明
                    </h4>
                </div>
                <div class="modal-body">
                    &nbsp;&nbsp;·&nbsp;&nbsp;欢迎您使用暑假绿卡（以下简称"本服务"）。在您使用本服务之前，请您务必仔细阅读并透彻理解本《免责声明》。您可以选择不使用本服务，但如果您使用本服务，您的使用行为将被视为对本声明全部内容的认可。</br>
                    在法律允许的范围内，本服务在此声明,不承担用户或任何人士就使用或未能使用本网站所提供的信息或任何链接或项目所引致的任何直接、间接、附带、从属、特殊、惩罚性或惩戒性的损害赔偿（包括但不限于收益、预期利润的损失或失去的业务、未实现预期的节省）。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务是用户授权我们，按照用户本人意愿代替用户进行体温打卡操作，对用户提供的住址等个人信息并不知情，用户需自行负责信息的真实性，我们不会储存您的任何个人隐私。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;我们没有义务了解用户实际的体温状况，用户需要对自己的体温负责，如果有发热等情况，用户有义务主动停止自动打卡服务，由于用户未按时停止打卡服务造成个人健康信息谎报的一切后果由用户本人承担，服务提供者没有任何责任。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务所提供的信息，若在任何司法管辖地区供任何人士使用或分发给任何人士时会违反该司法管辖地区的法律或条例的规定或会导致本网站或其第三方代理人受限于该司法管辖地区内的任何监管规定时，则该等信息不宜在该司法管辖地区供该等任何人士使用或分发给该等任何人士。用户须自行保证不会受限于任何限制或禁止用户使用或分发本网站所提供信息的当地的规定。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务可能因合作方或相关电信部门的互联网软硬件设备故障或失灵、或人为操作疏忽而全部或部分中断、延迟、遗漏、误导或造成资料传输或储存上的错误、或遭第三人侵入系统篡改或伪造变造资料造成无法自动打卡等，对此用户同意理解和接受。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务可能因黑客攻击、计算机病毒侵入或发作、政府管制而造成的暂时性关闭，或因前述原因以及与本网站链接的其它网站原因导致个人资料泄露、丢失、被盗用或被篡改等，对此用户同意理解和接受。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务有权在任何时候，修改或暂停、终止本平台全部或部分服务，对此用户可以理解和接受。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;本服务图片，文字之类版权申明，如果侵犯，请及时通知我们，本网站将在第一时间及时删除。</br>
                    &nbsp;&nbsp;·&nbsp;&nbsp;凡直接、间接使用本服务，视为自愿接受本网站声明的约束。</br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="modal fade" id="helps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        帮助
                    </h4>
                </div>
                <div class="modal-body">


                    <h5>1.打卡信息修改的问题</h5>
                    <ul>宿舍，地址，班主任姓名等信息是根据您的历史打卡信息获取的，如若您想修改信息，请先行取消任务，第二天早上自己打卡修改信息，再提交云任务，这样以后您打卡信息就是您修改了的啦！
                    </ul><br />

                    <h5>2."貌似"没提交的问题</h5>
                    <ul>
                        有用户反馈说查看鑫考云app"体温上报"栏目中体温为空，以为没有打卡成功，其实并不是没有上报成功，其实只是在“体温上报”栏目中没有显示出来而已！可以打开第二个栏目"体温记录"查看是否有当天提交记录[只要是日志上显示“提交成功”或“已提交，不可重复”的，就一定是提交成功的！]<br />
                        <img src="https://temp.hissin.cn/pic/error1.png" height="200px">
                    </ul><br />

                    <h5>3.获取不到宿舍信息的问题</h5>
                    <ul>
                        因为我们是通过鑫考云获取历史打卡信息的api获取宿舍 班主任 地址 联系方式等信息，所以要保证前一天的信息是正确的，近来发现有些同学提交云任务的前一天没有打卡，就会导致宿舍信息错误。解决方法是第二天先自行打卡，第三天就可以正常自动打卡啦
                    </ul><br />
                    <h5>4.鑫考云登录问题</h5>
                    <ul>
                        打卡进程只会在0.001秒内占用你的账号，你可以自由登录鑫考云，“其他设备登录”只是提醒，无视重新登录即可
                    </ul>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    
    <div class="modal fade" id="lan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        烂活
                    </h4>
                </div>
                <div class="modal-body">

                    <h5>本模块内容会经常更新，敬请关注</h5>
                    <h5>1.虚拟摄像头</h5>
                    <ul>
                        网课必备！！！<br />
                        <a href="https://www.bilibili.com/read/cv11603378" target="_blank">https://www.bilibili.com/read/cv11603378</a>
                    </ul><br />

                    <h5>2.小鑫作业助手</h5>
                    <ul>
                        由GeekPara成员@YouXam开发<br />
                        利用小鑫作业bug，上传他人二卷。自动录入选择题答案。键盘输入录选择题，优雅的选择。<br />
                        使用方法:<br />
                        1.使用chrome/firefox安装<a href="https://www.tampermonkey.net/" target="_blank">tampermonkey(浏览器搜索扩展)</a><br />
                        2.<a href="https://greasyfork.org/zh-CN/scripts/421351-%E5%B0%8F%E9%91%AB%E4%BD%9C%E4%B8%9A%E5%8A%A9%E6%89%8B" target="_blank">点击安装小鑫作业助手浏览器脚本</a>
                       <br />
                        
                    </ul><br />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        使用必读
                    </h4>
                </div>
                <div class="modal-body">

                    <h5>使用</h5>
                    <ul>
                        # 在“服务注册”模块按照提示填入/选择。</br>
                        # 注册后您可以选择QQ/DingTalk渠道加入群聊，用于反馈，通知，和水群(不是~)。</br></br>
                        # 因为我们通过获取您的历史记录来填充提交数据的字段，所以您必须先自行打一次卡，才能实现自动打卡。</br>
                        # 我们定于每日北京时间06:00提交体温数据，届时您的鑫考云将会提示“有其他设备在登录”，是正常现象！您可以随时重新登录，无须考虑可能会与代打卡服务冲突！</br>
                        # 如果您不想继续使用可以点击“取消服务”以取消，或修改您的鑫考云密码，系统检测到密码错误会自动删除。</br></br>
                        # 欢迎您分享此项目至班级/同学群，方便大众。</br></br>
                    </ul>
                    
                    
                    
                    <h5>运营方式</h5>
                    <ul>
                        我们没有采取付费使用和内部使用的方式，而是采取公开运行，用户自愿赞助的方式运营。</br>
                        本项目的服务器，域名以及一切相关费用皆为开发者担负，如果您觉得好用，欢迎赞助，所有赞助将用于维护此项目和提供下一个假期的服务。</br>
                        <span style="color:red">开发维护不易，请赞助支持！！！</span>
                        <img src="pic/reward.png" height='100px'>
                    </ul><br />
                    
                    
                    
                    <h5>项目历程</h5>
                    <ul>此项目最初上线于2020年寒假，</br>2020年寒假和2021年暑假由@纾浚维护,</br>2021年寒假由@纾浚 @Sweitea @Czz @hissin维护,</br>升学原因2022年暑假由@hissin' @Czz维护。
                    </ul><br />

                    <h5>承诺</h5>
                    <ul>
                        我们只会保存您的账号以及加密后的密码，不会保存其他任何您的个人信息，我们承诺会在暑假结束时删除保存的信息，如果下一假期还需要使用，您可以重新注册。
                    </ul><br />

                    <h5>原理</h5>
                    <ul>
                        通过抓取并分析鑫考云数据包，开发了这个平台。</br>
                        模拟数据包提交来实现自动打卡的功能。</br>
                        通过获取您的历史记录来填充提交数据的字段，所以您必须先自行打一次卡，才能实现自动打卡。</br>
                        
                        下面是api调用列表：</br>
                        https://twsb.xinkaoyun.com:8099/temp/report/studentSaveTemp (提交体温数据)</br>
                        https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory (获取历史记录)</br>
                        https://usr.xinkaoyun.com/api/HSCPC/Login (PC版登录，获取token和必要信息)</br>
                        https://usr.xinkaoyun.com/api/HSCApp/NewLogin_jiami (移动端登录，获取手机版token和必要信息)</br>
                    </ul><br />


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="modal fade" id="removing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        取消服务
                    </h4>
                </div>
                <div class="modal-body">

                    <form action="index.php" method="POST">
                        <input type="text" placeholder="鑫考云手机号" class="form-control " name="removePhone" id="removePhone" autocomplete="off"><br />
                        <input type="submit" value="删除" class="btn btn-primary w-100 col-lg-4">
                    </form>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>






    <footer>
        <div class="container">
            <h2>暑假绿卡</h2>
            <p>为<?php echo countUseNum(); ?>位衡中小伙伴提供免费体温打卡服务，稳定运行<?php echo runDay(); ?>天</p>

            <h6>Copyright &copy; 2022. 
            <!--<a href="https://hissin.cn" style="color:white;">hissin'</a> & Czz  ╳ -->
            <a href="https://GeekPara.com/"><img src="https://temp.hissin.cn/pic/geekpara.png" height="20px"></a> All rights reserved. </h6>
        </div>
    </footer>
    <!-- end footer -->

    <!-- script -->
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/fontawesome.js"></script>
    <script src="static/js/bootstrap-dropdownhover.min.js"></script>
    <script src="static/js/aos.js"></script>
    <script src="static/js/custom.js"></script>
    

    
    <script>

    


function get_cookie(Name) {
    let returnvalue = "";
    let search = Name + "=";
    if (document.cookie.length > 0) {
        let offset = document.cookie.indexOf(search);
        if (offset != -1) {
            // if cookie exists
            offset += search.length;
            // set index of beginning of value
            end = document.cookie.indexOf(";", offset);
         // set index of end of cookie value
            //if (end == 10){
                //end = document.cookie.length;
            returnvalue=unescape(document.cookie.substring(offset, end));
            return returnvalue;
                //}
        }
        else{
            return "";
        }
    }
    else{
        return "";
    }

}

$(document).ready(function(){
    var getSessionResult = get_cookie("popped");
    if (getSessionResult ==""){
        var e = document.createEvent("MouseEvents");
        e.initEvent("click", true, true);
	    document.getElementById("about-show").dispatchEvent(e);
        document.cookie="popped=yes"
    }
});

</script> 


    
    
    </body>

</html>

<?php 
sign();
remove(); 
?>