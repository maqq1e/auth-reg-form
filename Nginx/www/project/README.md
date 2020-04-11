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
