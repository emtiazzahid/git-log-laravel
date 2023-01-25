Git Log Laravel
==================

[![Packagist](https://img.shields.io/packagist/v/emtiazzahid/git-log-laravel.svg)](https://packagist.org/packages/emtiazzahid/git-log-laravel)
[![Packagist](https://img.shields.io/packagist/l/emtiazzahid/git-log-laravel.svg)](https://packagist.org/packages/emtiazzahid/git-log-laravel) 
[![Packagist](https://img.shields.io/packagist/dm/emtiazzahid/git-log-laravel.svg)](https://packagist.org/packages/emtiazzahid/git-log-laravel) 
[![Author](https://img.shields.io/badge/author-@emtiaz_zahid-blue.svg)](https://twitter.com/emtiaz_zahid)

![capture d ecran 2020-1-23 a 10 37 18](https://github.com/emtiazzahid/git-log-laravel/blob/master/src/Example/screenshot.png?raw=true)

TL;DR
-----
Git Log Viewer for Laravel 5, 6, 7, 8 & 9. **Install with composer, create a route to `GitLogLaravelController`**. No public assets, no vendor routes, works with and/or without log rotate. Inspired by rap2hpoutre's [Laravel log viewer](https://github.com/rap2hpoutre/laravel-log-viewer) 

Install (Laravel)
-----------------
Install via composer
```
composer require emtiazzahid/git-log-laravel
```

Add Service Provider to `config/app.php` in `providers` section
```php
Emtiazzahid\GitLogLaravel\GitLogServiceProvider::class,
```

Add or use existing route in your web routes file:
```php 
Route::get('git-log', '\EmtiazZahid\GitLogLaravel\GitLogLaravelController@index')->name('git-log');
```

Go to `http://myapp/git-log` or some other route

**Optionally** publish `git.blade.php` into `/resources/views/vendor/git-log-laravel/` for view customization:

```
php artisan vendor:publish \
  --provider="EmtiazZahid\GitLogLaravel\GitLogServiceProvider" \
  --tag=views
``` 

Troubleshooting
---------------

If you got a `InvalidArgumentException in FileViewFinder.php` error, it may be a problem with config caching. Double check installation, then run `php artisan config:clear`.

