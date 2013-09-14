
check out the repo

Required module PHP,php-mysql,mod_rewrite apache 

point your apache web service root to application/public/ folder

Edit database configurations in  aplication/config/config.php

Extract the mysql-dump zip from application database and import into your local mechine

give application/tmp and uploads/ 777 permissions or write access

paste this code in .htaccess

<IfModule mod_rewrite.c>
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php?url=$1 [PT,L]

</IfModule> 

you can also place the above rules in apache conf(vhost conf).


TODOS:

Secure file upload ;
validate uploded csv file 
current implementation of push to database by reading csv file support for one time only(that to you need to truncate if you have older data and upload).this can be improved in future 



