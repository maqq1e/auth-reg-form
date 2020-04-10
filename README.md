# PHP AUTH/REGISTER
 * [ReadMe in Russian](https://github.com/maqq1e/auth-reg-form/README_RU.md) - Русская версия документации
## Login and password
For testing you can login
* Login: `admin`
* Password: `admin`
## Intall
1) Install any local server in your PC ( OSpanel for exemple )
2) Open folder with other web-sites in your local server
3) Clone repository in your directory:
```
$ git clone https://github.com/maqq1e/auth-reg-form.git
$ cd auth-reg-form/
```
4) Open PhpMyAdmin and import database dump from ./database_backup/ directory
5) Run your server
6) Open `auth-reg-form/status_server` and find information about php configurate file in your server
![Php info](https://i.imgur.com/9GdpS61.png)
7) Open this derectory and replace `php.ini` file to `php.ini` file from ./configure/ directory
8) Restart your server
## Directory system
-- app/
----- controllers/
----------------- controller_404.php
----------------- controller_login.php
----------------- controller_logout.php
----------------- controller_main.php
----------------- controller_reg.php
----------------- controller_register.php
----------------- controller_send_image.php
----------------- controller_session_data.php
----------------- controller_status_server.php
----------------- controller_switch_leng.php
----- core/
---------- config.php
---------- controller.php
---------- database.php
---------- model.php
---------- route.php
---------- view.php
----- database/
-------------- database_login.php
-------------- database_main.php
-------------- database_register.php
-------------- database_send_image.php
----- models/
------------ model_login.php
------------ model_main.php
------------ model_register.php
------------ model_send_image.php
----- views/
----------- 404_view.php
----------- main_view.php
----------- reg.php
----------- template_view.php
----- bootstrap.php
-- css/
-- images/
-- js/
-- .htaccess
-- index.php
