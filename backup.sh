#!/bin/bash
#
rm -rf backup/
mkdir -p backup/app/Config
mkdir -p backup/app/Controllers
mkdir -p backup/app/Database/Migrations
mkdir -p backup/app/Database/Seeds
mkdir -p backup/app/Filters
mkdir -p backup/app/Language
mkdir -p backup/app/Models
mkdir -p backup/app/Views/errors
cp -av app/Filters/*.php backup/app/Filters/
cp -av app/*.php backup/app/
cp -av app/Config/App.php backup/app/Config/
cp -av app/Config/Auth.php backup/app/Config/
cp -av app/Database/Migrations/*.php backup/app/Database/Migrations/
cp -av app/Database/Seeds/*.php backup/app/Database/Seeds/
cp -av app/Config/Routes.php backup/app/Config/
cp -av app/Config/Routing.php backup/app/Config/
cp -av app/Config/Validation.php backup/app/Config/
cp -av app/Config/Filters.php backup/app/Config/
cp -av app/Config/Events.php backup/app/Config/
cp -av app/Config/Autoload.php backup/app/Config/
cp -av app/Config/Email.php backup/app/Config/
cp -av app/Language/en backup/app/Language/
cp -av app/Language/id backup/app/Language/
cp -av app/Models/*.php backup/app/Models/
cp -av app/Controllers/*.php backup/app/Controllers/
cp -av app/Views/errors/view_error.php backup/app/Views/errors/
cp -av app/Views/*.php backup/app/Views/
cp -av app/Views/Auth backup/app/Views/
cp -av app/Views/beranda backup/app/Views/
cp -av app/Views/layout backup/app/Views/
cp -av app/Views/pengguna backup/app/Views/

cp -av add_*.php test_*.php backup.sh ci4-update.sh dot.htaccess backup/
rm -fv backup/app/Controllers/Home.php
rm -fv backup/app/Views/welcome_message.php
clear
find backup/ -type f