<p align="center"><a href="https://www.github.com/betamemo" target="_blank"><img src="https://drive.usercontent.google.com/download?id=1zi4tql9TtpSwqgMDuNbm1L5r-Yl0-CIU&authuser=0" width="100"></a></p>

## Bookworm
This web application is designed to assist you keep track of your books by functioning as your personal librarian. There are functions that lets you to create book lists, add tags to each book, and keep track of your reading progress. You can also view and write reviews for the books you've read. Whether you are a book lover who wants to organize your book collection, this web application will make your life easier.

## Developer
- Bandita K ([@betamemo](https://www.github.com/betamemo))

## Requirements
- [Laravel 11](https://laravel.com/docs/11.x/releases)

## Environment Variables
-

## Installation instructions 
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
- Seed the data: `php artisan db:seed`

## Attributions
- <a href="https://www.freepik.com/icon/worm_742389#fromView=search&page=1&position=40&uuid=37d70866-a784-4155-b66c-c33d3128921d">Icon by Freepik</a>
