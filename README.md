## KYENI HMS 

This is a system to manage Hospital operations

## KYENI HMS installation 

git clone <url>

composer install 

create and set up the .env file 


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testdb
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate


# Run the seeders 

php artisan db:seed  --class=AdminSeeder
php artisan db:seed  --class=PermissionSeeder
php artisan db:seed  --class=RoleSeeder


# Run the application using

php artisan serve


