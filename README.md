
# Cryptokaktus 

Application created as an activity for the possibility of a vacancy as a laravel developer.
- Page with video,images and infos https://kaktuscoder.com.br/cryptokaktus/
  
## How to install

- git clone https://github.com/CleversonAbreu/cryptokaktus.git
- cd cryptokaktus
- composer install 
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed --class=UsersTableSeeder 
- php artisan db:seed --class=CryptosTableSeeder 
- php artisan db:seed --class=TransactionTableSeeder 
- php artisan serve



