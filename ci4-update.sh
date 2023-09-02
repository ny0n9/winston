rm -rf ci4-update
composer create-project codeigniter4/appstarter ci4-update
cd ci4-update
composer install --no-dev
composer require myth/auth
rm -fv app/Config/App.php
rm -fv app/Config/Email.php
rm -fv app/Config/Filters.php
rm -fv app/Config/Routes.php
rm -fv app/Config/Routing.php
rm -fv app/Config/Validation.php
rm -fv app/Common.php
cp -av composer.* builds phpunit.xml.dist preload.php ../
cp -av app ../
cp -av vendor ../
cp -av tests ../
cd ../
rm -rf ci4-update