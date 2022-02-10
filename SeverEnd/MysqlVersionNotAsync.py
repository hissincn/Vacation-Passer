import pymysql
import requests
import base64
import random
#coding=utf-8

def onePerson(phone,password,schID):
    appuser={
        'User-Agent': 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5'
    }
    headersNon = {
        'User-Agent': 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50'
    }

    headerForm = {
        'User-Agent': 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5',
        'Content-Type': 'application/x-www-form-urlencoded'
    }


    phone64 = base64.b64encode(phone.encode(encoding="utf-8")).decode()
    password64 = base64.b64encode(password.encode(encoding="utf-8")).decode()
    global null
    null = ''



    getInform1 = requests.post('https://usr.xinkaoyun.com/api/HSCPC/Login', 
        headers=headersNon, 
        data={
        'userName': phone,
        'password': password
    })
    getInformation = eval(getInform1.text)
   
    


    getInfor2Post = {
        'schoolId': getInformation['data']['pardt'][schID]['SchoolId'],
        'userId': getInformation['data']['pardt'][schID]['UserId'],
        'userToken': getInformation['data']['token'],
        'student_id': getInformation['data']['pardt'][schID]['StudyCode'],
        'student_name': getInformation['data']['pardt'][schID]['StuName']
    }

    getInfor2ok = requests.post(
        'https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory', headers=headerForm, data=getInfor2Post)
    getInfor2 = eval(getInfor2ok.text)

   

    
    getTonken = requests.post(
        'https://usr.xinkaoyun.com/api/HSCApp/NewLogin_jiami', headers=appuser, data={'phone': phone64, 'password': password64})
    
    Token = eval(getTonken.text)['data']['token']
    randomTemp=str(random.uniform(36.0,36.6))[:4]

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


    postForm = requests.post('https://twsb.xinkaoyun.com:8099/temp/report/studentSaveTemp',headers=headerForm, data=FormWillSubmit)
    mesa=eval(postForm.text)

    return(getInformation['data']['pardt'][schID]['StuName']+":"+mesa['msg']+",体温"+randomTemp+"&#8451;")

db = pymysql.connect(host='localhost',
                     user='',
                     password='',
                     database='')
 
cursor = db.cursor()
cursor.execute("SELECT * FROM users")
users = cursor.fetchall()

for one in users:
    try:
        print(one[0],":",onePerson(one[1],one[2],int(one[3])),"<br/>")

    except:
        print(one[0],":",one[1],"用户名或者密码不正确","<br/>")
        continue