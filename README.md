### FAQ_FINALPROJECT
  Steps to Run the Project:
  1)	Clone the Faq_WSd_FinalProject : https://github.com/RadhikaGujar/Faq_WSd_FinalProject.git
  2)	Run composer install, composer update and set run configuration.
  3)	Connect to sqlite database and rename .env file.
  4)	Run - php artisan migrate
  5)	Run php key:generate
  6)	Project is cloned and ready to run.
  
#### Feature: Email Verification Feature
  1.	Once the user registers an email is sent to the user on his registered mail id to verify the email id and the 
        user is directed to login page instead of directly allowing the use to get logged in after registration.
  2.	When the user clicks on the verification link it directs it to the login page with a message that ‘Email is 
        verified and continue to login’. The user is then allowed to login with his valid credentials.
  3.	If the user by mistake deletes the activation email or tries to login without clicking on the verify email he 
        will get a message ‘Verification link sent again and click on it to login’.
  4.	After successful login the user can view all the questions and answers.
  5.	User can create a question and also answer the other questions. A particular user can only edit/delete the 
        answer or question created by only them and cannot modify the questions or answers by other users.
  6.	Feature test added to check if the user can register, verify through link sent on email and login successfully.
  7.	Added tests to test the data type of email id passed and also test if user has entered the correct email id and 
        password while login.
  8.	Dusk test performed to check if user can register, click on verify link and then login after verification and 
        create a question.   
  
####For Details:
  
  1. Sendgrid used for sending email notification.
 
  2. Sometimes email appears in other folders instead of mailbox; do check other folders as well.
  
  3. Run command ‘phpunit’ to run feature and unit tests.
  
  4. Run command ‘php artisan dusk’ to run dusk test.
  
####Heroku Link:
  
  https://finalprojectradhika.herokuapp.com/
