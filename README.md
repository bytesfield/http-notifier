# Authentication Service Lumen

A simple HTTP Notification System (Http-Notifier) Using the Observer Design Pattern built with Laravel.

# Installation

### Step 1

Clone or download this repository to your machine:

-   Clone the repo: `git clone https://github.com/bytesfield/http-notifier.git`
-   [Download from Github](https://github.com/bytesfield/http-notifier/archive/refs/heads/main.zip).

### Step 2

`composer install` to install all composer packages

Create your database, rename `.env.example` to `.env` then, change `DB_DATABASE` value to your database.

`php artisan migrate` to create necessary tables

### Step 3

Start your laravel development server : `php artisan serve` this serve the application to default `localhost:8000`

When publishing a topic make sure you execute `php artisan queue:work` on your terminal to dispatch the necessary queued jobs.

### Step 4

Open Postman run the Api endpoints. Documentation can be accessed below

# Documentation

The API documentation is hosted on [Postman Doc](https://documenter.getpostman.com/view/10912779/TVKEXcVs)

# Contribution

Want to suggest some improvement on the codes? Make a push request or find me on
<a href="https://twitter.com/SaintAbrahams/">Twitter.</a>
<a href="https://www.linkedin.com/in/abraham-udele-246003130/">Linkedin.</a>

# License

Source codes is license under the MIT license.
