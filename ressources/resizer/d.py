from selenium.webdriver.chrome.webdriver import WebDriver


def switchtab(driver: WebDriver, tab=0):
    try:
        driver.switch_to.window(driver.window_handles[tab])
    except IndexError:
        driver.execute_script('window.open("");')
        switchtab(driver, tab)
