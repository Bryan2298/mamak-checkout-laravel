## Steps to run code ##

> - Install XAMPP (if not installed) and start Apache and MySQL.
> - Go to localhost/phpmyadmin and create a database locally named "mamak_db" utf8_general_ci
> - Download composer https://getcomposer.org/download/
> - Unzip the file to htdocs folder.
> - Check if you have the .env file with the DB_DATABASE=mamak_db line set. Otherwise do the step below:
	- Rename .env.example file to .env (remove the ".example") inside your project root and change the line DB_DATABASE=mamak_db.
> - Open the console and cd your project root directory. For example (cd c/xampp/htdocs/mamak-checkout)
> - Run composer install or php composer.phar install. If you have composer installed, ensure that it is updated.
> - Run php artisan key:generate
> - Run php artisan migrate
> - Run php artisan db:seed to run seeders.
> - Run php artisan serve

#### To view the UI ####
##### In your web browser, type in localhost:8000 ####
- The UI shows a simple dropdown where we are able to select the available food and drink.
- After selecting the food/drink you want, you can then proceed to click on the "Scan" button.
- Below the Scan button shows the "List" of items we have selected and also it's total price.