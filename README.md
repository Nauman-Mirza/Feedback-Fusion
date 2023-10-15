Feedback-Fusion

About Feedback Fusion : Web Application on Laravel for Handling and Creating Feedback for bugs, improvment and for new features demand and User can also vote

Manual Instruction:
1. First you have to create .env file and setup the env file like datbase name, password etc
2. Then you have to create sql database for this, you can craete mysql or postgressql both
3. Then you have to option this project on vs code and run all these commands.
4. composer install (it install al the required packages automatically)
5. php artisan migrate (through this command, databases tables created in your database)
6. php artisan db:seed --class=AdminSeeder (through this admin data will be automatically insert into admin table for admin login only)
7. php artisan serve

Roles:
1. Simple user : Can only view the feedbacks and comments on the feedbacks
2. Logged In or Authenticated User : Can view all the feedback, can add new feedback, can comment on someones feedback and also can vote on someone's feedback for support to the feedback
3. Admin : Can view all the users, delete users, can view all feedbacks, can view all comments of any feedback and also can diaabale comments on any feedback.

Thankyou !!