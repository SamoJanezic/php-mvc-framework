# php-mvc-framework
made with php 7.4.33;

#start\
locate folder\
composer update\
docker-compose up -d\
docker exec -it php-mvc-framework_app_1 php migrations.php\
docker-compose restart\
copy ".env.example" to ".env"

webpage will be available on localhost:8080\
phpmyadmin on localhost:8081\

#stop\
docker-compose down
