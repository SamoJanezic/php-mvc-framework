# php-mvc-framework
made with php 7.4.33;

#start
docker-compose up
docker-compose up -d (detached mode)

#set up migrations
docker exec -it php-mvc-framework_app_1 bash
php migrations.php
ctrl+d to exit

#stop
docker-compose down
