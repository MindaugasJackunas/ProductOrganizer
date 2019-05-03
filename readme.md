# Product organizer

Simple product organizer.

[Task objective in Lithuanian language.](task.md)

## Requirements

* Git with configured Github.com account
* PHP 7.1+
* Composer
* Vagrant
* Virtualbox

## Installation

### Add to your hosts file:

```
192.168.10.10  homestead.test
```

Clone source

```
git clone https://github.com/MindaugasJackunas/ProductOrganizer.git
```

Install dependencies

```
cd ProductOrganizer && composer install
```

Build VM

```
vagrant up
```

## Usage

### Log into machine

```
vagrant ssh
```

### Change to application folder

```
cd code
```

### Setup app

```
composer run-script post-root-package-install
composer run-script post-create-project-cmd
php artisan migrate
```

### Add category

```
php artisan category:add
```

### List categories

```
php artisan category:list
```

### Add product

```
php artisan product:add
```

### List products

```
php artisan product:list
```

### Filter products by category

```
php artisan product:add --category={id}
```

### Retrieve product JSON through URL

http://homestead.test/api/items/{id}

## TODO

* Product price localised value object
* Proper product price serialization in console and api
* Object input validation (Product and Category)
* Many-to-many relationship for Product-Category
* Unit and integration and end-to-end tests
* Higher code standards (PSR2 or PSR12 with PHPCodeSniffer)
* Clean domain from eloquent classes (models, collections, etc)
* Separate HTTP error handler
* Disable DEBUG mode
* More automation in VM provisioning