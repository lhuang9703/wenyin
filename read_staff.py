import xlrd
import xlwt
import openpyxl
import pymysql
import hashlib


db = pymysql.connect('','','','', charset='utf8')
cursor = db.cursor()


path="staff.xlsx"
workbook = xlrd.open_workbook(path)
sheets = workbook.sheet_names()
worksheet = workbook.sheet_by_name(sheets[0])  #获取第一个表单
for i in range(0, worksheet.nrows):
	if i!=0 and i!=1 and i!=worksheet.nrows-1: #去掉无用信息
	    row = worksheet.row(i)

	    wname=worksheet.cell_value(i, 2)
	    wno=worksheet.cell_value(i, 3).split("@")[0]
	    wpassword=wno[7:].encode('ascii')

	    m = hashlib.sha256()
	    m.update(wpassword)
	    wpassword=m.hexdigest()
	    # print(wname, "\t", end="")
	    # print(wno, "\t", end="")
	    # print(wpassword, "\t", end="")

	    sql="INSERT into wstaff(wno,wpassword,wname,wprivilege)  values('%s','%s','%s', %d)"%(wno,wpassword,wname,2)
	    try:
	    	cursor.execute(sql)
	    	db.commit()
	    except:
	    	print("lalala")
	    	print(wname, "\t", end="")
	    	db.rollback()
db.close()