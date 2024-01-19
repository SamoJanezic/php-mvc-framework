#!/bin/bash
cp .env.example .env
composer update
php migrations.php
exec "$@"