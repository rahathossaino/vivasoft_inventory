# To install the project follow this procedure
1. Run `git clone`:https://github.com/rahathossaino/vivasoft_inventory.git
2. Run `cd vivasoft_inventory` to navigate vivasoft_inventory
3. Then run `composer install` to install composer
4. Set .env file properly
5. Run `php artisan migrate`
6. Run `php artisan passport:keys` and `php artisan passport:client --personal` for passport authentication system
7. Comment `ProductQty::factory()->create()` then Run `php atisan db:seed`
8. Uncomment `ProductQty::factory()->create()`and comment the rest
9. Finally run `php artisan serve` to run the project 
10. After inserting data into  database(products table) run `php atisan db:seed` this again as this will insert data for `ProductQty`
