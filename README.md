Zend On The Go API
==================
Zend On The Go is a sample mobile application designed to show developers how to create mobile applications on top of existing PHP back-ends. The application uses HTML5/CSS/JS on the client side and Zend Framework + Apigility with Zend Server on the back-end. The application itself monitors your application and gives you live statistics on your server performance.

This repository contains the source code of the server-side API part of the application. The source code of the mobile part of the application is available in the [zendtech/on-the-go-mobile](https://github.com/zendtech/on-the-go-mobile) repository.

Table of Contents
-----------------
- [Importing the project in Zend Studio](#importing-the-project-in-zend-studio)
- [Setting up the OAuth2 database](#setting-up-the-oauth2-database)
- [Testing the API with Zend Studio](#testing-the-api-with-zend-studio)
- [Configuring locally installed Zend Server in Zend Studio](#configuring-locally-installed-zend-server-in-zend-studio)
- [Configuring Zend Server on AWS in Zend Studio](#configuring-zend-server-on-aws-in-zend-studio)
- [Deploying the application](#deploying-the-application)
- [Debugging the application](#deploying-the-application)

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

Configuring locally installed Zend Server in Zend Studio
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

Configuring Zend Server on AWS in Zend Studio
-------------------------------------------
The following steps will configure a Zend Server running on Amazon Web Services for usage in Zend Studio. The steps cover configuration for deployment, automatic uploading of file changes and SSH tunneling for remote debugging.

1. Open the PHP Servers view.
2. Click on the Add button in the view's toolbar. This will launch the PHP Server Creation wizard.
3. Select the Remote Zend Server item from the list. Click the Next button.
4. Give a display name in the Server Name field.
5. In the Base URL field replace "localhost" with the IP of the AWS instance.
6. Click on the Next button. This leads to the Configure Zend Server Deployment page.
7. Select the Enable Zend Deployment checkbox.
8. Click on the Detect Key Details button.
9. Enter user name and password in the Zend Server Credentials popup and click OK.
10. The Key Name and Key Hash fields will be automatically filled.
11. Click on the Finish button. This leads to the Configure Automatic Upload page.
12. Click on the Manage button to configure new connection profile. This will open the New Remote System Connection wizard.
13. Fill the Host Name field with the IP of the AWS instance.
14. Leave SSH Only in the System Type field.
15. Click on the Finish button. This will lead to the Remote Connection Profile wizard.
16. Change the Username field to "ubuntu".
17. Leave the Password field empty - the authentication with AWS happens using SSH key pairs.
18. Click on the Test Connection button to check that the connection is configured properly. If the test fails check if any of the private keys configured in Zend Studio (see them in the General > Network Connection > SSH2 preference page) are configured in the AWS account too. 
19. Click on the Finish button. This will lead back to the Configure Automatic Upload wizard page adn the new connection profile will be selected.
20. Click on the Next button. This will lead to the Configure SSH Tunneling page.
21. Select the Enable SSH Tunneling checkbox.
22. Set the Username field to "ubuntu".
23. Leave the Password field empty.
24. Set the SSH Private Key to a key that is configured in the AWS account.
25. Click on the Add button in the Port Forwarding section to configure the tunneling for remote debugging. This will open the Create Port Forwarding dialog.
26. Change the Side field to "remote".
27. Set the "Local Address" field to "127.0.0.1".
28. Set the "Local Port" field to "10137".
29. Leave the "Remote Address" field empty.
30. Set the "Remote Port" field to "10137".
31. Click on the Finish button. This will lead back to the Configure SSH Tunneling wizard page.
32. Click on the Finish button to complete the server configuration.

Deploying the application on Zend Server
-------------------------------------
1. Right-click on the on-the-go-api project and select Deploy To... from the context menu. This will launch the Deploy PHP Application wizard.
2. Select a server in the "Deploy to" field.
3. Optionally, configure the Application URL and Application Name fields.
4. Click on the Next button.
5. Fill the parameters for Web API key and hash, and OAuth2 database user, password and db name. These parameters will be filled in the config/autoload/global.php file of the deployed application.
6. Optionally, click on the Export button to save the parameters in a properties file. This file can be imported via the Import button to make further deployments easier.
7. Click on the Finish button.
8. Wait for the application to be deployed.

Debugging the application
-------------------------
Debugging the PHP code on the server-side after sending a request from the mobile app can be done by enabling the Debug Mode on Zend Server. When in debug mode Zend Server will trigger a debug session for each HTTP request. The debug session will be opened in Zend Studio and mapped to the project files in the workspace.

1. Open the PHP Servers view.
2. Right-click on the server where the application is deployed and select Start Debug Mode. The debug mode will be started. If there is an SSH tunnel configured for this server, it will be opened too, so remote debugging can work.
3. Place a breakpoint in a PHP file, e.g. module\OnTheGo\src\OnTheGo\V1\Rest\MonitorIssue\MonitorIssueResource.php, fetchAll(), line 68.
4. Run the mobile application with CordovaSim.
5. Switch to the Monitor tab (login if required).
6. A debug session will be triggered in Zend Studio. Resolve any Path Mapping questions if asked.
7. The execution will break on the breakpoint.

### Switching of Break at First Line

By default new debug sessions break the execution on the first executable PHP line. This can be annoying in some cases.

To switch this behavior off:

1. Go to Window > Preferences from the main menu.
2. Go to the PHP > Debug preferences page.
3. Deselect the Break at First Line checkbox.
4. Click the OK button. Any running debug mode will be restarted to apply the new setting.

### Performance optimization for Zend Server on AWS

When opening a debug session, Zend Server tries to find Zend Studio in a list of IPs. The list is send from Zend Studio to Zend Server when starting the debug mode. If the list is too long and contains IPs that are not reachable this may significantly delay the opening of the debug session. Usually, this is not a problem when Zend Server is in the same network like Zend Studio, but is problematic when Zend Server is in a cloud like AWS. In the cloud use case remote debugging is usually executing through an SSH tunnel and Zend Server needs to only check the 127.0.0.1 address.

To optimize the IP list:

1. Go to Window > Preferences from the main menu.
2. Go to the PHP > Debug > Installed Debuggers preferences page.
3. Select Zend Debugger from the list.
4. Click the Configure button. This will open the Zend Debugger Settings dialog.
5. Change the Client Host/IP from Auto to Manual.
6. Remove all IPs instead of 127.0.0.1 in the text field below.
7. Click the OK button to close the Zend Debugger Settings dialog.
8. Click the OK button to close the preferences.

