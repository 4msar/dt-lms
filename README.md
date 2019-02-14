# Laravel LMS Application

This project is a project of [Saiful Alam](https://github.com/msa-rakib) build for DevTravelers.

## Installation

Clone the repository-
```
git clone https://github.com/msa-rakib/DT-lms.git LMS
```

Then cd into the folder with this command-
```
cd LMS
```

##### Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. 
Just edit these three parameter(`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `lms` and then do a database migration using this command-
```
php artisan migrate
```

Then change permission of storage folder using thins command-
```
(sudo) chmod 777 -R storage
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Ask a question?

If you have any query please contact at msa4rakib@gmail.com
