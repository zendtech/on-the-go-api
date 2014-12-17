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
The REST and RPC APIs provided by the application are protected with OAuth2 authentication. Therefore, you must setup the OAuth2 database before you are able to run the application. The following steps must be executed on the system where the application will be run.

1. Install Zend Server. The application fetches data from Zend Server via the Web API, so you need one installed.
2. Install MySQL Sever. Required to serve the OAuth2 database.
3. Create new database with name "otg-oauth2", i.e. ```CREATE DATABASE `otg-oauth2`;```
4. Select the database, i.e. ```USE `otg-oauth2`;```
5. Create the database schema. It's best to execute the SQL script from the ZF-OAuth2 module, e.g. ```SOURCE C:/Users/kaloyan/Zend/workspaces/DefaultWorkspace12/on-the-go-api/vendor/zfcampus/zf-oauth2/data/db_oauth2.sql;```
6. Add a "demo" user with password "zend" in the "oauth_users" table, i.e. ```INSERT INTO oauth_users VALUES ('demo','$2a$10$DDveLEGuyvfCa58rvDF3Ee4J.jGeUFQ4Vu.Y8yU5G4CFqrmaMjMpi','Demo','User');```. This is the default user and password used by the mobile application. The password must be encrypted with BCrypt.
7. Add an "on-the-go" client in the "oauth_clients" table, i.e. ```INSERT INTO oauth_clients VALUES ('on-the-go','','/oauth/receivecode','password','','');```
 
Testing the API with Zend Studio
--------------------------------
During development time the APIs can be easily tested with the Apigility integration in Zend Studio. This requires local installation of Zend Server and the OAuth2 databases as described above.

1. Configure the config/autoload/local.php file:
  - Set a valid Web API key and hash in the "zend-server" array
  - Set the username and password for the local MySQL server if different from the default root/root.
2. Open the Apigility Editor. Right-click on the on-the-go-api project and select Open Apigility Editor. This will launch the PHP built-in server and open the Apigility Admin UI in an editor in Zend Studio.
3. Navigate to the OnTheGo API.
4. Click on the Authorization link.
5. Disable the authentication for the API methods you want to test. This will make testing much easier.
6. Save the configuration.
7. Click on the Overview link.
8. Click on the service you want to test, e.g. MonitorIssues.
9. Click the orange "Test service" button in the service header (you must hover on the header to see it).
10. The Test Service view will open pre-configured for testing the service.
11. Optionally, configure HTTP methods, parameters and headers.
12. Click on the Send Request button (the green arrow on the top-right corner).
13. See the result in the Response area.

Configure locally installed Zend Server in Zend Studio
------------------------------------------------------
If you have a locally installed Zend Server, Zend Studio will detect it during startup. There is an additional configuration required to enable deployment of applications from Zend Studio to the local Zend Server.

1. Open the PHP Servers view. There should be a Local Zend Server item already available there. R
2. Right-click on the Local Zend Server and select Edit from the context menu. This opens the Edit Server wizard.
3. Switch to the Deployment tab.
4. Select the Enable Zend Deployment checkbox.
5. Click on the Detect Key Details button.
6. Enter user name and password in the Zend Server Credentials popup and click OK.
7. The Key Name and Key Hash fields will be automatically filled.
8. Click on the Finish button.

Deploy the application on Zend Server
-------------------------------------
1. Right-click on the on-the-go-api project and select Deploy To... from the context menu. This will launch the Deploy PHP Application wizard.
2. Select a server in the "Deploy to" field.
3. Optionally, configure the Application URL and Application Name fields.
4. Click on the Next button.
5. Fill the parameters for Web API key and hash, and OAuth2 database user, password and db name. These parameters will be filled in the config/autoload/global.php file of the deployed application.
6. Optionally, click on the Export button to save the parameters in a properties file. This file can be imported via the Import button to make further deployments easier.
7. Click on the Finish button.
8. Wait for the application to be deployed.
