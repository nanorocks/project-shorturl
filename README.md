# project-shorturl

Even nanorocks can have personal url shortener

[![🚀 Deploy shorturl app to cPanel](https://github.com/nanorocks/project-shorturl/actions/workflows/deployPanel.yml/badge.svg?event=deployment)](https://github.com/nanorocks/project-shorturl/actions/workflows/deployPanel.yml)

### Docker devbox
The project is build on top of docker devbox so, all you need is to have docker desktop installed on you pc and then you can navigate to root to run: 

docker-compose up -d | For starting the devbox

docker-compose down | To clean up all containers

### Project access

- Project is running on http://localhost:80
- Db client is running on http://localhost:54320

Db creating for project
- go to http://localhost:54320
- set provider Mysql
- set username root
- set password secret
- set server database
- after login create database with name db_name and db_name_test for testing

### Env setup

- All you need it to copy the .env.example to .env and run the app container to execute
	- php artisan key:generate
	- php artisan migrate:fresh --seed
	- (for running tests) php artisan test

- Default demo user password is: password
