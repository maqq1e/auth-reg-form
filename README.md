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
-- app/\n
----- controllers/\n
----------------- controller_404.php\n
----------------- controller_login.php\n
----------------- controller_logout.php\n
----------------- controller_main.php\n\n
----------------- controller_reg.php\n
----------------- controller_register.php\n
----------------- controller_send_image.php\n
----------------- controller_session_data.php\n
----------------- controller_status_server.php\n
----------------- controller_switch_leng.php\n
----- core/\n
---------- config.php\n
---------- controller.php\n
---------- database.php\n
---------- model.php\n
---------- route.php\n
---------- view.php\n
----- database/\n
-------------- database_login.php\n
-------------- database_main.php\n
-------------- database_register.php\n
-------------- database_send_image.php\n
----- models/\n
------------ model_login.php\n
------------ model_main.php\n
------------ model_register.php\n
------------ model_send_image.php\n
----- views/\n
----------- 404_view.php\n
----------- main_view.php\n
----------- reg.php\n
----------- template_view.php\n
----- bootstrap.php\n
-- css/\n
-- images/\n
-- js/\n
-- .htaccess\n
-- index.php\n
