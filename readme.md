## Simple CRUD 

A simple Laravel App to simulate simple process of storing values submitted from form in to txt file 

[Demo](https://mysimplecrud.herokuapp.com/) hosted on Heroku

**Installation:**

1. Local environment (using php artisan serve)
   Assuming you are using Ubuntu 16.04, there are several steps you should do :
   - Open your terminal, run as super user by typing :
      
      `sudo su`
      
   - Change the current directory to /var/www/html/
      
      `cd /var/www/html/`
      
   - execute git clone command
      
      `git clone https://github.com/kennykarnama/simple_crud.git`
      
   - Wait after it finishes. 
   
   - change the current directory to simple_crud dir
      
      `cd simple_crud`
   
   - Run `composer install`
   
   - Don't forget to change if .env.example to .env if necessary
   
   - Run `php artisan key:generate`
   
   - Finally, run `php artisan serve`
   
   - Open your browser, and go to localhost:8000
   
 2. Local environment (using static access)
    
    If you don't want to run `composer install` and various installation from previous steps, simply repeat repeat the first four        steps in previous step, and open your browser, type `localhost/simple_crud/public`. Remember to change folder permission of simple_crud directory, by run command `sudo chmod -R 777 simple_crud`
 
**How to use**

From demo page, basically this app provides functionalities :

- store data submitted from form into txt with format 
  `name,email,date_of_birth (yyyy-mm-dd),address`

- display data that has been submitted

Each of data submitted will be stored in txt file in comma separated values. **So you are expected not to include any additionals comma delimiter in each form fields you'll fill.** 

[Just watch this video for the tutorial](https://drive.google.com/open?id=1K1Z5uJxbTdBkpg0s8_t6nqYxbUc-VxNN) 

**Testing**

Although it is a simple project, but it is equiped with unit testing using php-unit and integration with [scrutinizer-ci](https://scrutinizer-ci.com). 

- To run php-unit, simply run `./vendor/bin/phpunit` in simple_crud folder.
- For scrutinizer-ci, you could see the result [here](https://scrutinizer-ci.com/g/kennykarnama/simple_crud/)




    
    
