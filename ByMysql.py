import pymysql
import requests
import base64
import random
import threading
import time
import json

# coding=utf-8


def onePerson(linenum, phone, password, schID):

    phone64 = base64.b64encode(phone.encode(encoding="utf-8")).decode()
    password64 = base64.b64encode(password.encode(encoding="utf-8")).decode()

    getInform1 = requests.post('https://usr.xinkaoyun.com/api/HSCPC/Login',
                               data={
                                   'userName': phone,
                                   'password': password
                               })

    getInformation = json.loads(getInform1.text)
    if (getInformation["resultCode"] == '-1'):
        print(linenum, ":", phone, "账号或密码错误<br/>")
    elif(getInformation["resultCode"] == '401'):
        print(linenum, ":", phone, "你的操作过于频繁,请稍后重试<br/>")
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
            print(linenum, ":", phone, "历史提交记录无数据<br/>")
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

            print(linenum, ":", getInformation['data']['pardt'][schID]
                  ['StuName']+":"+mesa['msg']+",体温"+randomTemp+"&#8451;<br/>")


db = pymysql.connect(host='',
                     user='',
                     password='',
                     database='')

cursor = db.cursor()
cursor.execute("SELECT * FROM users")
users = cursor.fetchall()
threads = []
for one in users:
    threads.append(threading.Thread(target=onePerson,
                   args=(one[0], one[1], one[2], int(one[3]))))

threadlistlong = len(threads)//100 % 10+1
for i in range(threadlistlong):
    for t in threads[i*100:(i+1)*100]:
        t.start()          # 开启线程
    for t in threads[i*100:(i+1)*100]:
        t.join()           # 等待所有线程终止
    if i != threadlistlong:
        time.sleep(10)
