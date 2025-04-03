# Table Views for Laravel Filament

A powerful package for managing table views in Laravel Filament applications.

## Features

- Create and manage custom table views
- Save favorite views
- Public and private views
- Custom filters and sorting
- User-specific views
- Easy integration with Filament

## Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher
- Filament 3.0 or higher

## Installation

You can install the package via composer:

```bash
composer require kozsuper/table-views
```

## Usage

1. Publish the service provider:

```bash
php artisan vendor:publish --provider="KozSuper\TableViews\TableViewsServiceProvider"
```

2. Run migrations:

```bash
php artisan migrate
```

3. Use the trait in your Filament resources:

```php
use KozSuper\TableViews\Filament\Concerns\HasTableViews;

class YourResource extends Resource
{
    use HasTableViews;
    
    // Your resource code...
}
```

## Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --provider="KozSuper\TableViews\TableViewsServiceProvider" --tag="config"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. 