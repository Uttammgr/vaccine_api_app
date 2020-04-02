# Steps to run this program

- ensure you have php installed with php verison of 7.2.5 along with composer
- created database 
- create `.env` file inorder to run the project, you can copy the `.env.example` and change the required fields
- Fill your database details including db.name, db.pass, db.username.
- after completing above steps you can run following commands.

 
## after above steps 
- Very first install all the dependencies regarding project using `composer install` .
- Make sure you have created `.env` first. 
- after that generate application key `php artisan key:generate`.
- then perform the migration of database table `php artisan migrate:fresh --seed`. this command is pair with two creating tables inside database and seeding it with some default values.
- for OAuth which has been implemented with Passport package you should run `php artisan passport:install` and then `php artisan passport:cliend --personal ` and hit enter.
- after successfully completing above steps run `php artisan serve` to finally run the project, you should get port address listed.

**Note**
> login credentials can be found in `UsersTableSeeder.php` and can be modified to the required use  
