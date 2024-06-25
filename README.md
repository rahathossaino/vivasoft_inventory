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


# API Endpoints

## Authentication Endpoints

### Register User
- **URL:** `base_url/api/register`
- **Method:** POST
- **Description:** Endpoint for registering a new user.

### Login
- **URL:** `base_url/api/login`
- **Method:** POST
- **Description:** Endpoint for user login.

### Logout
- **URL:** `base_url/inventory/product/logout`
- **Method:** POST
- **Description:** Endpoint for logging out the user.

## Product CRUD Endpoints

### Fetch All Products
- **URL:** `base_url/inventory/product/index`
- **Method:** GET
- **Description:** Fetches all products from the database.

### Store Product
- **URL:** `base_url/inventory/product/store`
- **Method:** POST
- **Description:** Stores a new product into the database.

### Show Product
- **URL:** `base_url/inventory/product/show/{productId}`
- **Method:** GET
- **Description:** Fetches details of a specific product identified by `{productId}`.

### Update Product
- **URL:** `base_url/inventory/product/update/{productId}`
- **Method:** PUT
- **Description:** Updates details of the product identified by `{productId}`.

### Delete Product
- **URL:** `base_url/inventory/product/destroy/{productId}`
- **Method:** DELETE
- **Description:** Deletes the product identified by `{productId}` from the database.