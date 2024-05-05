<p align="center"><a href="https://www.github.com/betamemo" target="_blank"><img src="https://drive.usercontent.google.com/download?id=1zi4tql9TtpSwqgMDuNbm1L5r-Yl0-CIU&authuser=0" width="100"></a></p>

## Bookworm
This web application is designed to assist you keep track of your books by functioning as your personal librarian. There are functions that lets you to create book lists, add tags to each book, and keep track of your reading progress. You can also view and write reviews for the books you've read. Whether you are a book lover who wants to organize your book collection, this web application will make your life easier.

## Developer
- Bandita ([@betamemo](https://www.github.com/betamemo))

## Model and Data Structure
- [Figma](https://www.figma.com/file/kWCWTYyb0J34N38lSrkXcQ/Bookworm)

## Requirements
- [Laravel 11](https://laravel.com/docs/11.x/releases)

## Required Environment
- php: ^8.2
- laravel/framework: ^11.0
- laravel/tinker: ^2.9

## Installation Instructions 
- Clone this project: `git clone`
- Install composer: `composer install`
- Copy a config to .env file: `cp .env.example .env`
- Set a key in .env file: `php artisan key:generate`
- Edit .env file to localhost:
  - APP_URL=`http://bookworm.test`
  - DB_DATABASE=`bookworm`
  - DB_USERNAME=`<your username>`
  - DB_PASSWORD=`<your password>`
- Migrate the database: `php artisan migrate` 
- Seed the data: `php artisan migrate:fresh --seed`

## Attributions
- <a href="https://www.freepik.com/icon/worm_742389">Icon by Freepik</a>
- <a href="https://www.freepik.com/icon/rating_6948698">Icon by Ian June</a>
- Photo by <a href="https://unsplash.com/@gulfergin_01?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Gülfer ERGİN</a> on <a href="https://unsplash.com/photos/white-and-brown-book-on-brown-woven-surface-LUGuCtvlk1Q?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
