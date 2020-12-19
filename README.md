<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

composer create-project laravel/laravel laravelPro

php artisan serve

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelPro
DB_USERNAME=root
DB_PASSWORD=

composer require laravel/jetstream

php artisan jetstream:install livewire

php artisan migrate

npm install && npm run dev

git commit -m "add laravel jetstream and auth "

add  nATIONAL_ID COLOMN


ADD  GENDER COLUMN

php artisan make:migration create_posts_table

php artisan make:migration create_Comments_table

php artisan make:controller CommentController --resource --model=Comment


Route::resource('posts','App\Http\Controllers\PostController');


php artisan migrate --path='./database/migrations/2020_12_15_180103_create__comments_table.php'



php artisan make:middleware CheckGender   ??


add crude  model and controller and table
