
check out the repo

requited module PHP,php-mysql,mod_rewrite apache 

point your apache web service root to application/public

Edit database configurations in  aplication/config/config.php

Extract the mysql-dump zip from application database and import into your local mechine

give application/tmp and uploads 777 permissions or write access

paste this code in .htaccess

<IfModule mod_rewrite.c>
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php?url=$1 [PT,L]

</IfModule> 

you can also place in apache conf(vhost conf).


TODOS:



