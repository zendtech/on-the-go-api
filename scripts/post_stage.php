<?php
/* The script post_stage.phpwill be executed after the staging process ends. This will allow
 * users to perform some actions on the source tree or server before an attempt to
 * activate the app is made. For example, this will allow creating a new DB schema
 * and modifying some file or directory permissions on staged source files
 * The following environment variables are accessable to the script:
 * 
 * - ZS_RUN_ONCE_NODE - a Boolean flag stating whether the current node is
 *   flagged to handle "Run Once" actions. In a cluster, this flag will only be set when
 *   the script is executed on once cluster member, which will allow users to write
 *   code that is only executed once per cluster for all different hook scripts. One example
 *   for such code is setting up the database schema or modifying it. In a
 *   single-server setup, this flag will always be set.
 * - ZS_WEBSERVER_TYPE - will contain a code representing the web server type
 *   ("IIS" or "APACHE")
 * - ZS_WEBSERVER_VERSION - will contain the web server version
 * - ZS_WEBSERVER_UID - will contain the web server user id
 * - ZS_WEBSERVER_GID - will contain the web server user group id
 * - ZS_PHP_VERSION - will contain the PHP version Zend Server uses
 * - ZS_APPLICATION_BASE_DIR - will contain the directory to which the deployed
 *   application is staged.
 * - ZS_CURRENT_APP_VERSION - will contain the version number of the application
 *   being installed, as it is specified in the package descriptor file
 * - ZS_PREVIOUS_APP_VERSION - will contain the previous version of the application
 *   being updated, if any. If this is a new installation, this variable will be
 *   empty. This is useful to detect update scenarios and handle upgrades / downgrades
 *   in hook scripts
 * - ZS_<PARAMNAME> - will contain value of parameter defined in deployment.xml, as specified by
 *   user during deployment.
 */  
ini_set ( "display_errros", 1 );
ini_set ( "error_reporting", E_ALL );

$apiKey = getenv ( "ZS_API_KEY" );
if (! $apiKey) {
    echo ("API_KEY env var undefined");
    exit ( 1 );
}

$apiHash = getenv ( "ZS_API_HASH" );
if (! $apiHash) {
    echo ("API_HASH env var undefined");
    exit ( 1 );
}

$oauth2DbUser = getenv ( "ZS_OAUTH2_DB_USER" );
if (! $oauth2DbUser) {
    echo ("ZS_OAUTH2_USER env var undefined");
    exit ( 1 );
}

$oauth2DbPassword = getenv ( "ZS_OAUTH2_DB_PASSWORD" );
if (! $oauth2DbPassword) {
    echo ("ZS_OAUTH2_DB_PASSWORD env var undefined");
    exit ( 1 );
}

$oauth2DbName = getenv ( "ZS_OAUTH2_DB_NAME" );
if (! $oauth2DbName) {
    echo ("ZS_OAUTH2_DB_NAME env var undefined");
    exit ( 1 );
}

$filePath = getenv ( "ZS_APPLICATION_BASE_DIR" ) . "/config/autoload/global.php";
$filestr = file_get_contents($filePath);
$filestr = str_replace("KEY_PLACEHOLDER", $apiKey, $filestr);
$filestr = str_replace("HASH_PLACEHOLDER", $apiHash, $filestr);
$filestr = str_replace("OAUTH2_USER_PLACEHOLDER", $oauth2DbUser, $filestr);
$filestr = str_replace("OAUTH2_PASSWORD_PLACEHOLDER", $oauth2DbPassword, $filestr);
$filestr = str_replace("OAUTH2_DATABASE_PLACEHOLDER", $oauth2DbName, $filestr);
file_put_contents($filePath, $filestr);
