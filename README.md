#Ticket system

##Install
Clone or download project

Run ```composer install```

Then run ```php artisan key:generate```

Copy ```.env.example``` to ```.env```

Configure your DB like:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Run ```php artisan migrate --seed```

Enjoy