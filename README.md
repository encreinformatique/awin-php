# Awin PHP

![CI](https://github.com/encreinformatique/reinerouge/workflows/CI/badge.svg)

This is a fork from [yuzu-co/awin-php](https://github.com/yuzu-co/awin-php)
While the original codebase supported PHP 5.6, I decided to drop it and PHP 7.0 to 7.1.
They ended their life and I do not use them either.

For those versions of PHP, please refer to the original codebase.

The name into the composer has now changed to `encreinformatique/awin-php`.

---

PHP library for the Awin API.

You can get your apiToken here: [https://ui.awin.com/awin-api](https://ui.awin.com/awin-api)

See full doc: [http://wiki.awin.com/index.php/Publisher_API](http://wiki.awin.com/index.php/Publisher_API)


## Install

Via Composer

``` bash
$ composer require encreinformatique/awin-php
```

## Usage

``` php
$apiToken = 'XXXXX'
$client = new Yuzu\Awin\Client($apiToken);
```

## Tests

```php
php composer test
```

## TODO

* GET commissiongroups missing 
* GET transactions by ID missing 
* GET reports missing 
