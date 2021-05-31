from selenium import webdriver
from bs4 import BeautifulSoup

driver = webdriver.Chrome('./chromedriver.exe')
url = 'http://45.79.43.178/source_carts/wordpress/wp-login.php?loggedout=true&wp_lang=en_US'
name = 'admin'
passw = '123456aA'

def get_username_using_Selenium():
    driver.get(url)
    username = driver.find_element_by_name('log').send_keys(name)
    pwd = driver.find_element_by_name('pwd').send_keys(passw)
    page = driver.find_element_by_id('wp-submit').click()
    soup = BeautifulSoup(page.content, 'html.parser')
    tag = soup.find("li", attrs={'id': 'wp-admin-bar-my-account'}).find('a', attrs={'class': 'ab-item'})
    usename = tag.text
    print(usename)

get_username_using_Selenium()


