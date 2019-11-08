*** Settings ***
Library  SeleniumLibrary

*** Variables ***


*** Test Cases ***
LoginTest
    open browser    https://vadelmapilvi.com/forum/login.php    firefox
    input text  name:username   Ville
    input text  name:password   metallica89
    click element   xpath://button[/html/body/center[2]/center/form/button]
    close browser
*** Keywords ***