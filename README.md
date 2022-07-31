##Steps to run code##

> - Create a database locally named "mamak_db" utf8_general_ci
> - Download composer https://getcomposer.org/download/
> - Install XAMPP.
> - Unzip the file to htdocs folder.
> - Check if you have the .env file with the DB_DATABASE=mamak_db line set. Otherwise do the step below:
	- Rename .env.example file to .env (remove the ".example") inside your project root and change DB_DATABASE=mamak_db.
> - Open the console and cd your project root directory
> - Run composer install or php composer.phar install
> - Run php artisan key:generate
> - Run php artisan migrate
> - Run php artisan db:seed to run seeders.
> - Run php artisan serve

#####You can now access the project at localhost:8000