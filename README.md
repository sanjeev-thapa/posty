## About Posty 

Posty is a post app made with laravel. Posty is made with Laravel which is accessible, powerful, and provides tools required for large, robust applications. Posty uses Laravel features, including but not limited to:

- Authentication
- Authorization (Policy)
- Artisan Console
- Routing
- Models
- Views
- Controllers
- Middleware
- Laravel Mix
- Validation
- Database Migrations
- Eloquent (ORM)
- Eloquent Relationships
- Eager Loading
- Pagination
- Model Factories
- Route Model Binding
- Collection
- Blade:
    - Templates
    - Components
    - Directives
- Laravel Helpers
- Soft Deleting
- Mail
- Method Spoofing
- CSRF Protection
- Carbon

This is open-source project licensed under the [MIT license](https://opensource.org/licenses/MIT).

##  Install Instructions
Posty can be installed by cloning the repository:

```
$ git clone https://github.com/sanjeev-thapa/posty.git
```

Next, Enter the project's root directory and install the project dependencies:

```
$ composer install && composer update
$ npm install && npm run dev
```

Next, Generate your application encryption key:

```
$ php artisan key:generate
```

Next, Rename ```.env.example``` to ```.env``` from the project's root directory. <br/>
Finally, [Configure your .env](https://laravel.com/docs/master/configuration) (root directory) and database (config/database.php). Then, Create the database and run the migrations:

```
$ php artisan migrate
```

## License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
