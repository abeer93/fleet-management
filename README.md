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
    php artisan key:generate
  ```
6. Generate JWT Secret Key:
  ```
    php artisan jwt:secret
  ```
7. Run migartions
  ```
    php artisan migrate --seed
  ```
8. Run test cases
  ```
    php artisan optimize:clear
    php artisan test
  ```
9. Run Servers
  ```
    php artisan serve --port 8080
  ```

## Test The APP
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
| `JWT_SECRET` | `string` | `SomeRandomString`| JWT secret key to generate auth tokens |


### Docs & Help
- [Laravel 10.x Documentation](https://laravel.com/docs/10.x)