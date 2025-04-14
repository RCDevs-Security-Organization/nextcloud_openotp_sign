#!/bin/bash
clear
composer update

php translationtool.phar convert-po-files
npm run build
