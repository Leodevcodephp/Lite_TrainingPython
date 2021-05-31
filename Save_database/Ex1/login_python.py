from twill.commands import *

def login_python():
    go('http://45.79.43.178/source_carts/wordpress/wp-admin/')
    showforms()
    formclear('1')
    fv("1", "log", "admin")
    fv("1", "pwd", "123456aA")
    submit("5")

login_python()