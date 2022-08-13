# 项目：Vacation-Passer
作者：hissin'

此项目最初上线于2020年寒假，2020年寒假和2021年暑假由@纾浚维护,2021年寒假由@纾浚 @Sweitea @Czz @hissin维护,升学原因2022年暑假由@hissin' @Czz维护。

## 鑫考云体温自动提交平台
+ 使用PHP实现了一个面向用户的服务平台，用于注册代打卡服务以及管理状态，这里是地址[https://temp.hissin.cn](https://temp.hissin.cn)
+ 使用Python实现了自动打卡脚本，应用于云原生或服务器，使用定时任务进行自动打卡

## 原理
+ 通过抓取并分析鑫考云数据包，开发了这个平台。
+ 模拟数据包提交来实现自动打卡的功能。
+ 通过获取您的历史记录来填充提交数据的字段，所以您必须先自行打一次卡，才能实现自动打卡。
+ **下面是api调用列表：**
  - https://twsb.xinkaoyun.com:8099/temp/report/studentSaveTemp (提交体温数据)
  - https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory (获取历史记录)
  - https://usr.xinkaoyun.com/api/HSCPC/Login (PC版登录，获取token和必要信息)
  - https://usr.xinkaoyun.com/api/HSCApp/NewLogin_jiami (移动端登录，获取手机版token和必要信息)
