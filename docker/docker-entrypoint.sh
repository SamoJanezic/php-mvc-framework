#!/bin/bash
cp .env.example .env
composer update
./docker/wait-for-it.sh db:3306 --timeout=60 -- php migrations.php

exec "$@"