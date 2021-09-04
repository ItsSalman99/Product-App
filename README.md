# Product-App
<hr/>
<h3> About app :</h3>
 -In this app users can register themselves and then he/she have to verify with the email to use the dashboard.

 -Then when the user login to the website he/she have to enter the verification code emailed to the user. (Two Factor Authentication)

 -If the user is an admin then he/she can add products from the dashboard and if the user is not an admin the he/she can only see the products added by admin.

<hr/>

<h2>How to use this app</h2>
    <ul>
        <li>First, <b>Clone</b> the repository</li>
        <li>Second, Copy <b>.env.example</b> file to <b>.env</b> and edit database credentials there, also email provider settings (to send verification codes)</li>
        <li>Third, <b>Run composer install</b></li>
        <li>Fourth, Run <b>php artisan key:generate</b></li>
        <li>Fifth, <b>php artisan migrate</b></li>
        <li>Sixth, <b>php artisan db:seed</b> (It has some users data for testing)</li>
        <li>Now Run your app with - <b>php artisan serve</b></li>
        <li>
            You can log in to the application with email : <b>salmanabbas@gmail.com</b> & password :<b>12345678</b>
        </li>
    </ul>

<hr/>

 # Lisence

 - You are free to go to clone this repository and use as you want. 
