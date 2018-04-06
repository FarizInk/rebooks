<h1>Rebooks</h1>


Rebooks App, simple online book store.


1. Clone this repository
2. <pre>cd laravel</pre>
3. <pre>composer install</pre>
4. <pre>php artisan key:generate</pre>
5. <pre>php artisan migrate --seed</pre>
6. <pre>cd ..</pre>
7. <pre>php -S localhost:8000</pre> or other ports
8. Open your browser with port.


Setting Register email validation :
1. open .env
2. add this :
<pre>
QUEUE_DRIVER=database
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=youremail@gmail.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=youremail@gmail.com
MAIL_FROM_NAME="Your Name"
</pre>

<code>Your account must meet the requirements :
1. enable the 2-step verification to google <a href="https://www.google.com/landing/2step/">Here</a>
2. Create App Password to be use by your system <a href="https://security.google.com/settings/security/apppasswords">Here</a></code>
