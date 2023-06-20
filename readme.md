# Football teams app
<p>A basic app for managing football teams and it's players.</p>
<p>This app makes provision for adding a football team and its players and transfer players between teams</p>

## Requirements to run this app
- PHP version 8.1 
- Postgres SQL
- Composer 
- latest node version 
- npm/yarn for node packages

## Local setup

-   Clone this repository.
-  create database on your machine 
-  change the content of `DATABASE_URL` in the .env to match your database credentials
-  run `composer install` to install `PHP` dependencies
-  run `php bin/console doctrine:migrations:migrate` to run database migration
-  go to `<rootFolder>/migrations` and in import `country.sql` and `currency.sql` files into your database

## Running the backend of this app
-  from `<rootFolder>` run `symfony server:start` to start your application

## Running the frontend of this app
-   open your terminal from `<rootFolder>` `cd frontend/teams` 
-   run `npm install`. You might have to use the `--force` flag due to some npm conflict and I have run out of time except during the weekend
-   run `npm run dev` and visit the specified url in browser, usually `http://localhost:5173`. 

<p>Home page looks like below</p>
![home](https://github.com/franklinekoh/teams/assets/30264870/f2945473-22b3-4d97-8d61-0a22abe07981)

<p>Add a team using the plus icon on top right of the page and continue using app</p>

<p>below short video to illustrate some features</p>
https://www.loom.com/share/8b54f58920244fb0892e246f0442a626

<p>Go to rootFolder/doc folder for API documentation with a postman collection </p>

###  As stated in the email, I would have added the following if I had a more hours to give for this project, except during the weekend:

- Add frontend form validations for better UX. Backend validations exists so that would do for data integrity
- Implement cache system for faster loading of results during database queries
- Use composable to handle errors better on the frontend
- Write unit tests, at least for the backend services
- Made the transfer page more reactive by adding newly bought players to player list without remounting the component
- Add edit player endpoint to be able to sell players without having to add them (if you want to sell a player, added them as a free agent when viewing a team)
- Implement payment with different currencies
- Add dialog/conformation UX for when buying/making a payer a free agent
- Use generic function/composable to handle error on the frontend
- Fix the aching npm conflict issue 
- Better error handling mechanism on the frontend
- Containerize the app for easier installation

