import requests
import base64
import random
import json

# coding=utf-8


def onePerson(phone, password, schID):

    phone64 = base64.b64encode(phone.encode(encoding="utf-8")).decode()
    password64 = base64.b64encode(password.encode(encoding="utf-8")).decode()

    getInform1 = requests.post('https://usr.xinkaoyun.com/api/HSCPC/Login',
                               data={
                                   'userName': phone,
                                   'password': password
                               })
    getInformation = json.loads(getInform1.text)

    getInfor2Post = {
        'schoolId': getInformation['data']['pardt'][schID]['SchoolId'],
        'userId': getInformation['data']['pardt'][schID]['UserId'],
        'userToken': getInformation['data']['token'],
        'student_id': getInformation['data']['pardt'][schID]['StudyCode'],
        'student_name': getInformation['data']['pardt'][schID]['StuName']
    }

    getInfor2ok = requests.post(
        'https://twsb.xinkaoyun.com:8099/temp/report/getStudentTempInfoHistory', data=getInfor2Post)
    getInfor2 = json.loads(getInfor2ok.text)

    getTonken = requests.post(
        'https://usr.xinkaoyun.com/api/HSCApp/NewLogin_jiami', data={'phone': phone64, 'password': password64})

    Token = json.loads(getTonken.text)['data']['token']

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
        'temperature': str(random.uniform(36.0, 36.6))[:4],
        'userToken': Token
    }

    postForm = requests.post(
        'https://twsb.xinkaoyun.com:8099/temp/report/studentSaveTemp', data=FormWillSubmit)
    mesa = json.loads(postForm.text)

    return(mesa['msg'])


userList = open("user.txt", 'r')
userLine = userList.readline()
line = 1
while userLine:
    try:
        userLine = userLine.rstrip("\n")
        userOne = userLine.split(",", 2)
        print(onePerson(userOne[0], userOne[1], int(userOne[2])))
        line += 1
        userLine = userList.readline()
    except:

        print(line, "is error", userLine)
        line += 1
        userLine = userList.readline()
        continue
