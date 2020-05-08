
<p align="center">
  <a href="https://github.com/zolomazizi/Environnement-news">
    <img src="https://i.imgur.com/mV0feYj.png" alt="Logo" width="350" height="130">
  </a>
  <p align="center">E-commerce Website for cooperative products</p>
</p>

## Content Table
* [Introduction](#Introduction )
* [Getting Started](#Getting-Started)
	* [Prerequisites](#Prerequisites)
	* [Installing](#Installing)
* [Built With](#Built-With)
* [Using the API ](#the-API )
* [Acknowledgments](#Acknowledgments)

## Introduction
An E-commerce website intended to help the cooperatives to boost up their sales across the country  

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and **testing** purposes.

## Prerequisites

Before you continue, ensure you have met the following requirements:
- Your need to have [GIT](https://git-scm.com/downloads) installed on your machine
- [PHP](https://www.php.net/downloads) 7.2 or above For Laravel Development.
- [XAMPP](https://www.apachefriends.org/fr/download.html) or  [WAMP SERVER](https://sourceforge.net/projects/wampserver/) or [LARAGON](https://laragon.org/download/index.html) For a Local Development Server. 
- [NodeJs](https://nodejs.org/en/download/) to install all the packages that the front end needs.
- [COMPOSER](https://getcomposer.org/) to install al the packager that the project needs.
## Installing
the following steps will get to the the point where you will have our project functional on your machine : 

First Run : 
```
$ Git Clone https://github.com/tahriouihsn/ecommerce-angular-laravel.git 
```
to get a copy of the project on your local machine . 
```
$ cd ecommerce-angular-laravel
```
- The following steps are in no particular Order :
-- go to the back folder using the command : 
```
$ cd Back 
```
-- then install all the packages needed via composer  :
```
$ composer install 
```
-- go to the front folder : 
```
$ cd ../Frontend
```
 -- then run the command `npm install` to install the NodeJs pachager the front end needs.

Now Create a database on your phpMyAdmin name if `ecoope123`.
if your database name was different than what we have suggested, don't worry. you can allways change the database  the the backend connected to from the .env file located at  	` Back/.env`. And go to `DB_DATABASE=yourDbName`.
* To create the tables you need to run the migration command provided by Laravel:
	```
	$ php artisan migrate:fresh
	```
* Now to fill out the database you need to run the seed command to get some fake data to start esting with 
	```
	$ php artisan db:seed	
	```
* you can now serve the back-end now using
	```
	$ php artisan serve 
	```
* and run the front-end using 
	```
	$ ng serve
	```
and Congrats you have a fully functional copy of the project **E-coopera** on you Machine.

##  Built With
This project was builed using the flowing thechnologues: 
* [Laravel](https://laravel.com/docs/6.x) The BackEnd Framework used to build the Restful Api .  
*  [Angular](https://angular.io/) The framework used  for building the UI. 

## the API 
- for a user to authenticate they need to go to the following Routes acourding to if they want to  register as a user or a cooperative represetative: 
	
	`POST: localhost:8000/api/user/register` 
	```
	{
		"user" = info , 
		"phone number" : {
			"cooperative object"
		},

		"adress" : {
			"cooperative object"
		}

	}
	```
	or 
	`POST: localhost:8000/api/seller/register`
	```
	{
		"user" = info , 
		"cooperative" : {
			"cooperative object"
		},
		"phone number" : {
			"cooperative object"
		},

		"adress" : {
			"cooperative object"
		}

	}
	```

* after they register and confirm their emails: 
	they go to : 
	`POST : localhost:8000/api/login`
	```
		{
			"email" : "example@gmail.com",
			"password" : "YourTypicalPassword"
		}
	```
	to get their token and start using the functionalities provided by the website . 
	
	For more indepth documentation on our API visite [Here](More-readmes/The-Api-Useage.md)
	
## Acknowledgments

This Section is Made to shout out all the people who Help making this project Real, With no Particular order: 
shoutout  to : 
* **Insert name** for helping out with the conception part and all the technical Questions we had. 
* **Insert name** for helping with the FrontEnd And the Api Consuming. 
* **Insert name** for being a great mentor and help guiding us until the end of this journey.