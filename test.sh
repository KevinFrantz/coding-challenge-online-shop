#!/bin/bash
(cd ./src && php -d memory_limit=128M vendor/bin/phpunit)
