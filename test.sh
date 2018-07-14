#!/bin/bash
docker exec -ti php_web php -d memory_limit=128M vendor/bin/phpunit
