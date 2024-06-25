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


# How to use 
1. Authentication endpoints
        --`base_url/api/register` for registering user
        --`base_url/api/login` for login
        --`base_url/inventory/product/logout` for logout
2. Product CRUD endpoints
        --`inventory/product/index` for fetching all products       
        --`inventory/product/store` for storing products into db    
        --`inventory/product/show/{productId}` for fetching  product corresponding to the productId       
        --`inventory/product/update/{productId}` for updaing product corresponding to the productId   
        --`inventory/product/destroy/{productId}` for deleting product corresponding to the productId   
             
