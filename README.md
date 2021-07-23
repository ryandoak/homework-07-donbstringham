# HW07 PHP and MySQL Databases

## <First Name - Last Name>

### Initial Setup

* Run `composer install`.
* MySQL Host: 143.110.159.170
* MySQL Port: 3306
* MySQL Database Name: 'Weber State username'
* MySQL Username: 'Weber State username'
* MySQL Password: letmein

### Problem Statement

In this assignment we will work on files in the `src/` directory exclusively.  You will need to both
add and modify code.  This assignment will be graded manually and **NOT** via unit tests.  Please only use the database listed in
the **Initial Setup** as the SQL will only work there.  You can use `composer server` to run the PHP
built-in web server.  Here are some URL's that you need to paste into your web browser.  

* [http://localhost:8000/Validation.php?col_string=Two&col_number=2](http://localhost:8000/SQLInjection.php?col_string=%27Two%27+OR+1=1--&col_number=2)
* [http://localhost:8000/SQLInjection.php?col_string=%27Two%27+OR+1=1--&col_number=2](http://localhost:8000/SQLInjection.php?col_string=%27Two%27+OR+1=1--&col_number=2)

#### Part 1 - Validation

Learn about validating input from a user or computer before persisting it.

Work on the `src/Validation.php`.

#### Part 2 - SQL Injection and PDO: PHP Data Objects

See an example of SQL Injection and fix it using PHP Data Objects.

Work on the `src/SQLInjection.php`.

### Notes

* Make sure your last push is before the deadline. Your last push will be considered as your final submission.
* Post questions on Canvas.
