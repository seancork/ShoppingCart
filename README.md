# Laravel Shopping Cart

A shopping cart with an API to be able to get data on items that were removed from users shopping cart.

## Built With

* PHP
* Laravel
* Livewire
* Bootstrap

## Project
### Cart

* Add products to cart using sessions.

* **Cart:** shows total items in cart, the total cost of items in cart, can remove items.

### API

* Get data from items that were removed from cart.
* Can get data by product name, date range, all removed items.

More on the API and examples can be seen here:

[Shopping Cart API page on Heroku](https://floating-tor-59169.herokuapp.com/api)

## Setup
* Clone and run composer update

* Config .env

* Run migration: php artisan migrate

* Run seeder for test data: php artisan db:seed

* Some PHPUnit Tests included, run: "vendor/bin/phpunit"

## Demo

[Demo of shopping cart](https://floating-tor-59169.herokuapp.com/api)

*note - this is a little slow to startup because of free heroku