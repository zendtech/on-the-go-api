Zend On The Go API
==================
Zend On The Go is a sample mobile application designed to show developers how to create mobile applications on top of existing PHP back-ends. The application uses HTML5/CSS/JS on the client side and Zend Framework + Apigility with Zend Server on the back-end. The application itself monitors your application and gives you live statistics on your server performance.

This repository contains the source code of the server-side API part of the application. The source code of the mobile part of the application is available in the [zendtech/on-the-go-mobile](https://github.com/zendtech/on-the-go-mobile) repository.

Importing the project in Zend Studio
------------------------------------
1. Switch to the PHP perspective, if not already there.
2. Call File > New > PHP Project from GitHub from the main menu.
3. Paste the Git repository URL in the URI field: https://github.com/zendtech/on-the-go-mobile.git (this URL will be different if you have forked the repository)
4. All other fields will be automatically filled. Click the Finish button.
5. You will find the on-the-go-api project in the PHP Explorer view.

Setting up the OAuth2 database
------------------------------
The REST API provided by the application are protected with OAuth2 authentication. Therefore, you must setup the OAuth2 database before you are able to run the application. The following steps must be executed on the system where the application will be run.

1. Install Zend Server. The application fetches data from Zend Server via the Web API, so you need one installed.
2. Install MySQL Sever. Required to serve the OAuth2 database.
3. Create new database with name "otg-oauth2", i.e. ```CREATE DATABASE `otg-oauth2`;```
4. Select the database, i.e. ```USE `otg-oauth2`;```
5. Create the database schema. It's best to execute the SQL script from the ZF-OAuth2 module, e.g. ```SOURCE C:/Users/kaloyan/Zend/workspaces/DefaultWorkspace12/on-the-go-api/vendor/zfcampus/zf-oauth2/data/db_oauth2.sql;```
6. Add a "demo" user with password "zend" in the "oauth_users" table, i.e. ```INSERT INTO oauth_users VALUES ('demo','$2a$10$DDveLEGuyvfCa58rvDF3Ee4J.jGeUFQ4Vu.Y8yU5G4CFqrmaMjMpi','Demo','User');```. This is the default user and password used by the mobile application. The password must be encrypted with BCrypt.
7. Add an "on-the-go" client in the "oauth_clients" table, i.e. ```INSERT INTO oauth_clients VALUES ('on-the-go','','/oauth/receivecode','password','','');```
