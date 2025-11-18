# laravelCorner
Getting Started with Laravel

## Steps:
- Download Visual C++ Redistributable v14 ie x84 and x64
  ```
  https://learn.microsoft.com/en-us/cpp/windows/latest-supported-vc-redist?view=msvc-170
  ```
- Install them in you PC
- Download php 8.2
- Extract it Local Disk C , rename folder as php
- Add to System Variable in Enviromrntal Variable
- Download Composer and install it.


  # Mysql DB setting
  - Download and Install mysql
    ```
    https://dev.mysql.com/downloads/
    ```
  - Add it to System VAriable inside  Enviroments Variables
    ```
    C:\Program Files\MySQL\MySQL Server 9.5\bin
    ```
  - Open CMD
    ```
    mysql -u root -p
    CREATE DATABASE school_website;
    SHOW DATABASES;
    USE school_website;
    SHOW TABLES;
    GRANT ALL PRIVILEGES ON school_website.* TO 'root'@'localhost';
    FLUSH PRIVILEGES;
    ```

## Importing a .sql file into your existing MySQL database
  - Open cmd
    ```
    mysql -u root -p -e "SHOW DATABASES LIKE 'school_website';"
    ```
  - Backup Existing DB
    ```
    mysqldump -u root -p school_website > D:Users\Desktop\school_website_backup.sql
    ```
  - Import a database
    ```
    mysql -u root -p school_website < C:\Users\Desktop\imported_db.sql
    ```
  - Verify Imported DB
    ```
    mysql -u root -p -e "USE school_website; SHOW TABLES;"
    ```
    
## Drop the Existing Tables Before Import
- Dro and Import
```
  mysql -u root -p -e "DROP DATABASE school_website; CREATE DATABASE school_website;"
  mysql -u root -p school_website < C:\Users\PC\Desktop\impoerted_db.sql
```

## Add swagger in laravel backend 
- Install swagger packages
  ```
  composer require darkaonline/l5-swagger
  php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
  php artisan l5-swagger:generate
  php artisan serve
  ```
  
- Document your APIs using Swagger annotations
  ```
  composer require zircote/swagger-php
  ```
  
- Then a controller
  ```
      /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get all users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="List of users"
     *     )
     * )
     */
    public function index()
    {
        return User::all();
    }

  ```
- After adding annotations, regenerate docs:
  ```
  php artisan l5-swagger:generate
  ```

- Configure paths (optional): Open config/l5-swagger.php and adjust:
  ```
      'paths' => [
        'annotations' => [
            base_path('app'),
            base_path('app/Http/Controllers'),
        ],
    ],


  'api' => [
    'title' => 'My Laravel API',
],

  ```
- Optional: Securing Swagger UI (JWT, Sanctum, etc.)
```
/**
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearerAuth",
 *     scheme="bearer"
 * )
 */

 * @OA\Get(
 *     path="/api/user",
 *     security={{"bearerAuth":{}}},
 *     ...
 * )

```
