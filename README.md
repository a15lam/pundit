### About

Pundit is a test project that allows you to post online reviews about fundraisers!!

It is built using the Laravel PHP framework and Vuejs + Bootstrap.

### Setup

#### Prerequisites:

* Please setup a MySQL database for this application to connect to.
* Please make sure you have PHP version 7.0.0+ (required by Laravel) installed on your machine.
* Please make sure you have composer (PHP dependency manager) installed on your machine (https://getcomposer.org/download/).

#### Installation:

    > git clone https://github.com/a15lam/pundit
    > cd pundit
    > composer install
    > cp .env.example .env
    > php artisan key:generate
    
Edit the .env file and provide your MySQL connection information using the environment options below.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

To use use Sqlite for database run the following command to create a Sqlite db file

    > touch database/database.sqlite

And then in .evn file only provide the following information about Database

    DB_CONNECTION=sqlite

Setup database tables by running the following command.

    > php artisan migrate --seed

Finally run the following command to fire the PHP based web server and launch the application using your browser.

    > php artisan serve
    
Note: this command will give you the url for launching the application.
