#!/bin/bash
docker-compose up -d
docker exec -ti php_web php setup/setup.php
bash test.sh
