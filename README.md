# Pharmacy-Management-System

# Installation
 Follow these steps to install the application.
1. Clone the Repository
```
git clone https://github.com/AbdallahAhmed2000/Pharmacy-Management-System.git
```
2. Go to project directory

```
cd Pharmacy-Management-System
```

3. Install packages with composer

```
composer install
```

4. Install npm packages with 
```
npm install; npm run dev
```
5. Create your database 

6. Set database connection to your database in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pharmacy
DB_USERNAME=root
DB_PASSWORD=
```
7. Import full database sql file in the database folder, or run migrations
Use this command to run migrations

```
php artisan migrate --seed
```
8. Start the local server and browser to your app.
This command will start the development server
```
php artisan serve
```

9. Open the address in the terminal in your browser.Usually address is usually like this:
```
http://127.0.0.1:8000
```

# login 

## As admin
```
 email: admin@admin.com
 password: admin
```
## As User(Sales man)
```
 email: Ahmed@email.com
 password: ahmed
```

![ScreenShot](screenshots/login.PNG?raw=true "Login page")

![Dashboard](screenshots/dashboard.PNG?raw=true "Dashbaord page")

![Profile](screenshots/suppliers.PNG?raw=true "User profile")

