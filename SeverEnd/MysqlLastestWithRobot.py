import pymysql
import requests
import base64
import random
import threading
import time
import json
import datetime

# coding=utf-8

def loging(log):
    print(log)
    logs.append(log)
    
    
def addlogs(log):
    tm=datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")  
    try:
       # 执行sql语句
        cursor.execute('INSERT INTO log(date,log) VALUES ("%s","%s")' % (tm,log))
        # 提交到数据库执行
        db.commit()
    except:
        db.rollback()
        
        
def pwerror(linenum,phone):
    tm=datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")  
    try:
       # 执行sql语句
       cursor.execute("INSERT INTO pwerror(id,phone,date) VALUES ('%d','%s','%s')" % (linenum,phone,tm))
       # 提交到数据库执行
       db.commit()
    except:
       # 如果发生错误则回滚
       db.rollback()
   
    try:
        # 执行SQL语句
       cursor.execute("DELETE FROM users WHERE id=%s" % (linenum))
       # 提交修改
       db.commit()
    except:
       # 发生错误时回滚
       db.rollback()


def dingPush(errphone, sussnum):
    word = requests.get('https://v1.hitokoto.cn/?c=e&c=j&encode=text').text
    msg="亲爱的小伙伴，当你醒来，沐浴着清晨的第一缕清风，我们早已为您提交好了体温。现在！您可以尽情奔跑，去聆听阳光的心跳。\n"
    msg += time.strftime("今天是%Y-%m-%d,每日一言：", time.localtime())+word+"\n"
    msg += "今日已帮助"+str(sussnum)+"位小伙伴成功提交打卡~\n"
    if len(errphone) == 0:
        msg += "没有小伙伴账号或密码错误,请继续保持哟！\n"
    else:
        msg += str(len(errphone))+"位小伙伴账号或密码错误,他们是：\n"
        for err in errphone:
            msg += "~手机号为"+str(err)+"的小可爱\n"
        msg += "~请这些小可爱们重新提交云任务哦！\n"
    msg += "·查看帮助及全部日志(具体体温)https://xk.hissin.cn/log.php \n·我要给开发者小朋友买包辣条https://xk.hissin.cn/donate.php \n·觉得好用不要忘了分享给身边的小伙伴哦!"
    

    json_content = {"at": {"isAtAll": True},"text": {"content":msg},"msgtype":"text"}
    requests.post("https://oapi.dingtalk.com/robot/send?access_token=你的token", data=json.dumps(json_content).encode(encoding='utf-8'), headers={'Content-Type': 'application/json'})



def wechatPush(errphone, sussnum):
    word = requests.get('https://v1.hitokoto.cn/?c=e&c=j&encode=text').text
    msg = "亲爱的小伙伴，当你醒来，沐浴着清晨的第一缕清风，我们早已为您提交好了体温。现在！您可以尽情奔跑，去聆听阳光的心跳。</br>每日一言："+word+"</br>"
    msg += "今日已帮助"+str(sussnum)+"位小伙伴成功提交打卡~</br>"

    if len(errphone) == 0:
        msg += "没有小伙伴账号或密码错误,请继续保持哟！</br>"
    else:
        msg += str(len(errphone))+"位小伙伴账号或密码错误,他们是：</br>"
        for err in errphone:
            msg += "~手机号为"+str(err)+"的小可爱</br>"
        msg += "~请这些小可爱们重新提交云任务哦！</br>"

    msg += "·<a href='https://xk.hissin.cn/log.php'>查看帮助及全部日志(具体体温)</a></br>" + "·<a href='https://xk.hissin.cn/donate.php'>我要给开发者小朋友买包辣条</a></br>" + "·觉得好用不要忘了分享给身边的小伙伴哦!"

    data = {
        "topic":'tiwen',
        "token": '你的token',
        "title": time.strftime("早安,今天是%Y-%m-%d,这有一份体温报告待查收~", time.localtime()),
        "content": msg
    }
    body = json.dumps(data).encode(encoding='utf-8')
    headers = {'Content-Type': 'application/json'}
    requests.post('http://pushplus.hxtrip.com/send',
                  data=body, headers=headers)
                  
                  

def qqshow(errphone, sussnum):
    word = requests.get('https://v1.hitokoto.cn/?c=e&c=j&encode=text').text
    msg="[@all]\n亲爱的小伙伴，当你醒来，沐浴着清晨的第一缕清风，我们早已为您提交好了体温。现在！您可以尽情奔跑，去聆听阳光的心跳。\n"
    msg += time.strftime("今天是%Y-%m-%d,每日一言：", time.localtime())+word+"\n"
    msg += "今日已帮助"+str(sussnum)+"位小伙伴成功提交打卡~\n"

    if len(errphone) == 0:
        msg += "没有小伙伴账号或密码错误,请继续保持哟！\n"
    else:
        msg += str(len(errphone))+"位小伙伴账号或密码错误,他们是：\n"
        for err in errphone:
            msg += "~手机号为"+str(err)+"的小可爱\n"
        msg += "~请这些小可爱们重新提交云任务哦！\n"

    msg += "·查看帮助及全部日志(具体体温)https://xk.hissin.cn/log.php \n·我要给开发者小朋友买包辣条https://xk.hissin.cn/donate.php \n·觉得好用不要忘了分享给身边的小伙伴哦!"
    print(msg)
    
    
    params1 = {
        'function': 'Api_SendMsg',
        'token': '你的token',  
        'c1': '机器人qq',
        'c2': 2,
        'c3': '群',
        'c4': '',
        'c5': msg
    }
    params2 = {
        'function': 'Api_SendMsg',
        'token': '你的token', 
        'c1': '机器人qq',
        'c2': 2,
        'c3': '群',
        'c4': '',
        'c5': msg
    }

    url = 'http://81.70.246.63:2525/MyQQHTTPAPI'  # 从MyQQ的http插件复制
    rp1 = requests.get(url, params=params1)
    rp2 = requests.get(url, params=params2)
    print(rp1.content.decode('utf-8'))  # 结果MyQQ反馈
    print(rp2.content.decode('utf-8'))  # 结果MyQQ反馈
    
    
def onePerson(linenum, phone, password, schID):
    global errphone
    global sussnum
    
    phone64 = base64.b64encode(phone.encode(encoding="utf-8")).decode()
    password64 = base64.b64encode(password.encode(encoding="utf-8")).decode()
    
    
    getInform1 = requests.post('https://usr.xinkaoyun.com/api/HSCPC/Login',
                               data={
                                   'userName': phone,
                                   'password': password
                               })
    getInformation = json.loads(getInform1.text)
    
    
    if (getInformation["resultCode"] == '-1'):
        errphone.append(phone)
        pwerror(linenum,phone)
        
        loging(str(linenum)+ ":"+phone+"账号或密码错误<br/>")
        
    elif(getInformation["resultCode"] == '401'):
        #print(linenum, ":", phone, "你的操作过于频繁,请稍后重试<br/>")
        #time.sleep(1)
        onePerson(linenum, phone, password, schID)
        
    elif(getInformation["resultCode"] == '-3'):
        loging(str(linenum)+":"+ phone+"请先去鑫考云绑定手机，报-3<br/>")
        
    else:
        getInfor2Post = {
            'schoolId': getInformation['data']['pardt'][schID]['SchoolId'],
            'student_id': getInformation['data']['pardt'][schID]['StudyCode'],
            'student_name': getInformation['data']['pardt'][schID]['StuName']
        }

        getInfor2ok = requests.post(
            'https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory', data=getInfor2Post)
        getInfor2 = json.loads(getInfor2ok.text)

        if(getInfor2["state"] == "fail"):
            loging(str(linenum)+":"+phone+"历史提交记录无数据<br/>")
            
        else:
            getTonken = requests.post(
                'https://usr.xinkaoyun.com/api/HSCApp/NewLogin_jiami',  data={'phone': phone64, 'password': password64})

            Token = json.loads(getTonken.text)['data']['token']
            randomTemp = str(random.uniform(36.0, 36.6))[:4]

            FormWillSubmit = {
                'iscontact_patients': '0',
                'hasto_riskareas': '0',
                'iscontact_foreigner': '0',
                'isfever_family': '0',
                'sex': getInformation['data']['pardt'][schID]['StuSex'],
                'grade_id': getInformation['data']['pardt'][schID]['GradeId'],
                'jibu_id': getInformation['data']['pardt'][schID]['JiBuId'],
                'schoolId': getInformation['data']['pardt'][schID]['SchoolId'],
                'grade': getInformation['data']['pardt'][schID]['GradeName'],
                'jibu': getInformation['data']['pardt'][schID]['JiBuName'],
                'clazz': getInformation['data']['pardt'][schID]['ClassName'],
                'student_name': getInformation['data']['pardt'][schID]['StuName'],
                'userId': getInformation['data']['pardt'][schID]['UserId'],
                'clazz_id': getInformation['data']['pardt'][schID]['ClassId'],
                'student_id': getInformation['data']['pardt'][schID]['StudyCode'],
                'mobile': phone,
                'teacher_header': getInfor2['data']['teacher_header'],
                'dormitory': getInfor2['data']['dormitory'],
                'address': getInfor2['data']['address'],
                'temperature': randomTemp,
                'userToken': Token
            }

            postForm = requests.post(
                'https://twsb.xinkaoyun.com:8099/temp/report/studentSaveTemp', data=FormWillSubmit)
            mesa = json.loads(postForm.text)
            
            if (mesa['msg']=="登录信息异常"):
                #print(linenum, ":", phone,",",getInformation['data']['pardt'][schID]['StuName'], mesa['msg'],",正在重试")
                #time.sleep(1)
                onePerson(linenum, phone, password, schID)
                
            else:
                loging(str(linenum)+":"+getInformation['data']['pardt'][schID]['StuName']+":"+mesa['msg']+",体温"+randomTemp+"&#8451;<br/>")
                sussnum+=1



#Main Program

start_time =time.time()
db = pymysql.connect(host='localhost',
                     user='',
                     password='',
                     database='')
cursor = db.cursor()
cursor.execute("SELECT * FROM users")
users = cursor.fetchall()

logs=[]
threads = []
errphone=[]
sussnum=0

for one in users:
    threads.append(threading.Thread(target=onePerson,args=(one[0], one[1], one[2], int(one[3]))))

for t in threads:
    t.start()          # 开启线程
    
for t in threads:
    t.join()           # 等待所有线程终止


addlogs("|".join(logs))  #数据库加入日志
print('一共用时：', time.time()-start_time)

 
#推送机器人       
try:
    qqshow(errphone, sussnum)
except:
    print("qq错误")
    
try:
    wechatPush(errphone, sussnum)
except:
    print("微信错误")   
    
try:
    dingPush(errphone, sussnum)
except:
    print("钉钉错误")


