
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


## How to use online version

- visit http://172.173.189.29/
- use email & password :
* emedhurst@example.org = password
* joyce.dibbert@example.com = password
* antonina98@example.org = password
* judah91@example.org = password

