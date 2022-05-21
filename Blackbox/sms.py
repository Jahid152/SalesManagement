from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/SalesManagement2/index.php")
time.sleep(5)

username = driver.find_element_by_id('inputUsername')
username.clear()
username.send_keys("atik")
time.sleep(5)

password = driver.find_element_by_id('inputPassword3')
password.clear()
password.send_keys("12345")

btnSubmit = driver.find_element_by_id('btnSubmit')
btnSubmit.click()
time.sleep(5)

productsmenu = driver.find_element_by_xpath('/html/body/nav/div/ul/li[3]/a')
productsmenu.click()
time.sleep(5)

searchbox = driver.find_element_by_id('productSearchKey')
searchbox.send_keys("Orange")
time.sleep(5)

searchbtn = driver.find_element_by_id('productSearchBtn')
searchbtn.click()
time.sleep(10)
driver.quit()

print("Search result displayed!")

while True:
	pass
