# ACWA
ACWA is an attendance checking web application for education centers.
## Product Demo
Link: http://acwa-itec.herokuapp.com/

Default admin account: admin@acwa.com, Password: adminacwa

As admin you can use all the functionality of the website.
## Installation
1. First, you must download and install compser: https://getcomposer.org/
2. Then you must have WAMP (for windows) or LAMP (for linux) in this tutorial, we assume you use WAMP. You can do the same with LAMP.
3. Create a database in LAMP
4. Create a file call .env in the root folder and copy the content of the .env.example
5. You must also have the latest version of Node.js:
https://nodejs.org/en/
## Configuration
1. .env:


Edit enviromental variables as following:
+  APP_URL: default URL for the web
+ DB_DATABASE: name of the database you created
+ DB_USERNAME: username you use to sign in phpMyAdmin (default: root)
+ DB_PASSWORD: password you use to sign in phpMyAdmin (default: empty)
+ MAIL_MAILER: stmp
+ MAIL_HOST: smtp.gmail.com
+ MAIL_PORT: 587
+ MAIL_USERNAME: the account which will be used to send emails
+ MAIL_PASSWORD: the application password for the email(not your password). Follow these instructions to get that password: https://support.google.com/mail/answer/185833?hl=en
+ MAIL_ENCRYPTION: tls
MAIL_FROM_ADDRESS: email address that send email to users
+ MAIL_FROM_NAME: email's username when sent to users
## Run the web
To run the application, first open a terminal in the root folder and run the following code
```bash
php artisan serve
```
```
NOTE: This terminal should be open when running the application
```
Next, open another terminal and run this code to run the migrations of the database:
```bash
php artisan migrate
```
The application should run now
## Edit CSS:
Open resources/css/app.css and edit there. Then in a terminal run:
```bash
npm install
npm run dev
```
## Usage:
### Default accounts:
Admin account:

email: admin@acwa.com

password: adminacwa
