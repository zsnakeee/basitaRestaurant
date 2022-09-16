# Basita Restaurant

Restaurant website to offer your products and manage it.


## Overview
![home](https://user-images.githubusercontent.com/96016084/190767881-24c4bda5-7119-46b0-94ba-1b6274109583.png)


## Features

- Cart system
- Order system
- Auth system
- Add products
- Add categories
- Manage orders

## Instaltion

```
composer install
copy .env.example to .env
#cp .env.example to .env
php artisan key:generate
php artisan storage:link

#after connect your database via .env file
php artisan migrate:fresh

#run the server
php artisan serve
```

## Screens
![cart](https://user-images.githubusercontent.com/96016084/190768257-337f6b10-76f4-46db-8626-1b359059ab3f.png)

![products](https://user-images.githubusercontent.com/96016084/190768362-d0636a9d-7e8d-4de5-9ebb-383470d503b2.png)

![add](https://user-images.githubusercontent.com/96016084/190769412-6955baba-1ef4-4f70-bb97-0a71a5e4e145.png)

