# PHP-CRUD-API

This repository contains a PHP CRUD (Create, Read, Update, Delete) API utilizing Phinx for migrations, MySQL database, and PDO.

## Usage

To start the server, run the following command:

```
php -S localhost:8000 routes/routes.php
```

### Allowed Routes

- **GET** `localhost:8000/products` - List all products
- **GET** `localhost:8000/products?id=1` - List product where id=1
- **POST** `localhost:8000/products` with JSON format - Creates product
  ```json
  {
    "title": "Bread",
    "price": 250,
    "description": "Just Water"
  }
  ```
- **PUT** `localhost:8000/products?id=1` - Updates product where id=1
  ```json
  {
    "title": "BreadNEW",
    "price": 250,
    "description": "Just Water"
  }
  ```
- **DELETE** `localhost:8000/products?id=1` - Deletes product where id=1

## Configuration

Create a `.env` file for database configuration, for example:

```
DB_HOST=host_name
DB_NAME=database_name
DB_USER=username
DB_PASSWORD=password
```

Ensure to replace `host_name`, `database_name`, `username`, and `password` with your actual database credentials.

