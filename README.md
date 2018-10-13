# IM4717 Web Application Design: Case Study Part 4

To work on Case Study Part 4 (or your project) on your local machine, you will need a web server since PHP files need to be run on the server. The short guide below shows how to set up a web server on your local machine.

### Setting up the environment

#### WAMP server

We use WAMP since it includes MySQL and its easy to set up too. Follow the installation instructions here: http://www.icynets.com/set-wampserver-computer/. (You can ignore the last step.)

With WAMP installed and running, you should be able to see the WAMP homepage in http://localhost.

Copy your project folder (e.g. public_html) to the WAMP projects folder `C:\wamp64\www`. In your browser, go to http://localhost/public_html and you should see your project files.

#### MySQL database

Go to http://localhost/phpmyadmin and log in with username: `root` and an empty password. Create a new user with the same log in details as the one in the computer lab (e.g. username: `f31im`, password: `f31im`). Grant the new user admin privilages and tick the option to create a new database with the username. Log out and make sure you can log in as the new user.

By setting the same username, password and database name, you don't have to change the MySQL connection variables in your PHP files when switching between your machine and the computer lab. However, the data and tables are not transferable i.e. data created in your local machine server will not appear in the computer lab server.
