# IM4717 Web Application Design: Case Study Part 4

To work on Case Study Part 4 (or your project) on your local machine, you will need a web server since PHP files need to be run on the server. The short guide below shows how to set up a web server on your local machine.

### Setting up the environment

#### WAMP server

We will use WAMP since it includes MySQL and its easy to set up too. Download and run the installer here: http://www.wampserver.com/en/#download-wrapper

![Installer](http://www.icynets.com/wp-content/uploads/2016/04/installing-wamp-2.png)

After the installation, search for 'Wampserver' in your Start menu and run the server. In your systems tray, the status of the server should display green which means the server is active or online and ready for use.

If it does not show green, it means another application is perhaps using the same port as the WampServer, in this case, you will need to close all applications and restart WampServer. Some applications that are known to cause WampServer not showing online includes Skype and some other game applications that use Port 80.

![status-icon](http://www.icynets.com/wp-content/uploads/2016/04/wampserver-server-status.png)

When your WampServer shows online, you can open your browser and go to http://localhost/ which will display the home page of the WampServer.

![homepage](http://www.icynets.com/wp-content/uploads/2016/04/WampServer-Server-Configuration.jpg)

*Credits: http://www.icynets.com/set-wampserver-computer/*

To close the server, right click on the WAMP icon in your system tray and click exit.

#### Project Directory

If you left the destination location to the default location during the installation process, then your projects folder should be located at `C:\wamp\www`.

Copy your project folder (e.g. public_html) to the WampServer projects folder `C:\wamp64\www`. In your browser, go to http://localhost/public_html and you should see your project files.

#### MySQL database

Next, we need to create a user and database in phpMyAdmin. Go to http://localhost/phpmyadmin and log in with username: `root` and an empty password.

Click on *User accounts* in the top menu bar, then *Add User Account* to create a new user. Enter the same log in details as the one in the computer lab (e.g. username: `f31im`, password: `f31im`). Tick the following options:

- Create database with the same privileges
- Grant all privileges on wildcard name
- Global privileges

Once that is done, log out (2nd icon, top left) and log in as the new user. You should see a new database with your username.

By setting the same username, password and database name, you don't have to change the MySQL connection variables in your PHP files when switching between your machine and the computer lab. However, the data and tables are not transferable i.e. data created in your local machine server will not appear in the computer lab server.
