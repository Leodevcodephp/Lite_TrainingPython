import requests
from bs4 import BeautifulSoup

payload = {
    'log': 'admin',
    'pwd': '123456aA'
}
url = 'http://45.79.43.178/source_carts/wordpress/wp-login.php?loggedout=true&wp_lang=en_US'

def get_user_using_request():
    with requests.Session() as s:
        p = s.post(url, data=payload)
        soup = BeautifulSoup(p.content, 'html.parser')
        tag = soup.find("li", attrs={'id': 'wp-admin-bar-my-account'}).find('a', attrs={'class': 'ab-item'})
        name = tag.text
        print(name)

get_user_using_request()