See below for English text.

Исходники Wordpress, плагины и темы сайта http://www.hackerspace.by/
Для правки и дебага на локальной машине нужен Git, PHP5+, MySQL.

Wordpress source, plugins and theme for http://www.hackerspace.by/  
For local development you will need Git, PHP5+ and MySQL.


Быстрый старт // Quick setup (add your own)
-------------------------------------------

Fedora:
```
sudo yum install git php php-mysql mysql mysql-server
sudo systemctl start mysqld.service
```

Настройка локальной БД // Setup local MySQL instance
```
mysql -u root -e "CREATE DATABASE wordpress"
mysql -u root -e "GRANT ALL PRIVILEGES ON wordpress.* TO username@localhost IDENTIFIED BY 'password'"
```

Скачай и беги // Download and run
---------------------------------
```
git clone git@github.com:minsk-hackerspace/hackerspace.by.git
cd hackerspace.by/
php -S localhost:8080
```

Обратная связь // Comments and enhancements
-------------------------------------------
https://groups.google.com/group/hackerspace-minsk


История // ChangeLog
--------------------
2012-02-12 - LVEE Winter - "блин, сколько можно хотеть"  
...  [ ] missing important dates, fill please  
2013-04-28 (jekhor) - set up a new wordpress-based site  
2013-05-03 (tektonov) - added README, quick start instructions,  
                        default config for local development  
...  
xxxx-xx-xx (your name) - contribution  

If you are reading this file up to this point, you're welcome
to meet and join us. ;)

