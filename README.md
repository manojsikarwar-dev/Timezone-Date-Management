-------------------- Timezone Date Management ---------------------

project Name : timezone-app

-----------------------------------------------------
-----------------------------------------------------

STEPS TO MAKE DEMO PROJECT

-----------------------------------------------------
-----------------------------------------------------

Step1 : Install fresh laravel project

Commands :
1) composer create-project --prefer-dist laravel/laravel timezone-app
-----------------------------------------------------
Step2 : Install auth 

Commands :
1) composer require laravel/ui
2) php artisan ui bootstrap --auth  
-----------------------------------------------------
Step3 : Perform changes in migrartions & run migrartions 

Commands :
1) php artisan migrate
-----------------------------------------------------
Step4 : Install collective form 

Commands :
1) composer require laravelcollective/html

Note : Add required changes config file app.php 

-----------------------------------------------------
-----------------------------------------------------

composer require doctrine/dbal

php artisan make:migration create_events_table --create=events

php artisan make:request StoreEventsRequest
php artisan make:request UpdateEventsRequest

php artisan make:controller EventController --resource



