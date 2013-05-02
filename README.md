Scroll down for English text.

Исходники Wordpress, плагины и темы сайта http://www.hackerspace.by/
Для правки и дебага на локальной машине нужен Git, PHP5+, MySQL.

Wordpress source, plugins and theme for http://www.hackerspace.by/
For local development you will need Git, PHP5+ and MySQL.


Quick Setup (add your own)
==========================

Fedora:

  sudo yum install git php php-mysql mysql mysql-server
  sudo systemctl start mysqld.service
  mysql -u root -e "CREATE DATABASE wordpress"
  mysql -u root -e "GRANT ALL PRIVILEGES ON wordpress.* TO username@localhost IDENTIFIED BY 'password'"


Download and Run
================

  git clone git@github.com:minsk-hackerspace/hackerspace.by.git
  cd hackerspace.by/
  php -S localhost:8080


History
=======
2012-02-12 - LVEE Winter - a starting point
...
2013-04-28 (jekhor) - set up a new wordpress-based site

