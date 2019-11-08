*** Settings ***
Library  SeleniumLibrary

*** Variables ***


*** Test Cases ***
LoginTest
    open browser    https://vadelmapilvi.com/forum/login.php    firefox
    input text  name:username   Username
    input text  name:password   Password
    click element   xpath://button[/html/body/center[2]/center/form/button]
    close browser
*** Keywords ***
