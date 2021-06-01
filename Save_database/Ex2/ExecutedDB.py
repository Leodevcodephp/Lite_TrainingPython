import mysql.connector
import pandas as pd

def ExecutedDB():
    #read csv file
    empdata = pd.read_csv('customer.csv', index_col=False, delimiter=',', na_filter=False)
    empdata.head()

    #connect db
    db = mysql.connector.connect(user='hiep', password='VanPi@0512!!!', host='127.0.0.1', db ='customercsv')

    if db.is_connected():
        cursor = db.cursor()

        #create table
        sqlCreateTable = "CREATE TABLE employeecsv (customerid varchar(255),firstname varchar(255),lastname varchar(255),companyname varchar(255),billingaddress1 varchar(255),billingaddress2  varchar(255),city   varchar(255),state   varchar(255),postalcode   varchar(255),country   varchar(255),phonenumber   varchar(255),emailaddress   varchar(255),createddate varchar(255))"
        cursor.execute(sqlCreateTable)
        db.commit()

        #insert data
        for i, row in empdata.iterrows():
            sql = "INSERT INTO employeecsvv VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
            cursor.execute(sql, tuple(row))
        db.commit()

        #get data
        sqlShowData = " SELECT * FROM employeecsvv"
        cursor.execute(sqlShowData)
        result =  cursor.fetchall()

ExecutedDB()


