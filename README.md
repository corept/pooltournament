# Pool Tournament Challenge

## Getting started

### Installation

Clone the repository

`git clone https://github.com/corept/pooltournament.git`

Switch to the repo folder

`cd pooltournament`

Install all the dependencies using composer

`composer install`

Copy the example env file and make the required configuration changes in the .env file

`cp .env.example .env`

Generate a new application key

`php artisan key:generate`

Create a local file database

`touch database/database.sqlite`

Run the database migrations

`php artisan migrate`

Run the database seeder

`php artisan db:seed`

Start the local development server

`php artisan serve`

You can now access the server at http://localhost:8000