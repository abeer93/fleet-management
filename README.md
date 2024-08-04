# Fleet Management
Bus booking system mvp application

## Requirement

1. [Laravel 10.x](https://laravel.com/docs/10.x)
2. [PHP >= 8.1](http://php.net/downloads.php)
3. [Composer](https://getcomposer.org/)

## Installation
1. Clone the repo via this url
  ```
    git clone https://github.com/abeer93/fleet-management.git
  ```
2. Enter inside the folder
  ```
    cd fleet-management
  ```
3. Create a `.env` file by running the following command
  ```
    cp .env.example .env
  ```
4. Install various packages and dependencies:
  ```
    composer install
  ```
5. Generate an encryption key for the app:
  ```
    app php artisan key:generate
  ```
6. Run migartions
  ```
    app php artisan migrate --seed
  ```
7. Run test cases
  ```
    php artisan optimize:clear
    php artisan test
  ```
8. Run Servers
  ```
    php artisan serve --port 8080
  ```

## Test The APP
Now, open your web browser and go to `http://localhost:8080/api/documentation` and check the swagger documentation and try it out.

## Postman Collection
For easier testing and development, you can use [the published Postman collection](https://documenter.getpostman.com/view/1146549/2sA3rwMuMz) to interact with the APIs.


## Important Environment variables (dev)

| Name | Type | Default | Description |
|------|------|---------|-------------|
| `APP_KEY` | `string` | `SomeRandomStringWith32Characters` | Application key |
| `DB_CONNECTION` | `string` | `mysql` | DB connection to use |
| `DB_HOST` | `string` | `mysql` | Hostname to connect |
| `DB_DATABASE` | `string` | `fleet_management` | Database name |
| `DB_USERNAME` | `string` | `root` | Database username |
| `DB_PASSWORD` | `string` | `empty` | Database password |


### Docs & Help
- [Laravel 10.x Documentation](https://laravel.com/docs/10.x)