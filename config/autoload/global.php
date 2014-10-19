<?php
return array(
    'zend-server' => array(
        'key' => 'KEY_PLACEHOLDER',
        'hash' => 'HASH_PLACEHOLDER',
        'url' => 'http://localhost:10081/ZendServer',
    ),
    'zf-oauth2' => array(
        'storage' => 'ZF\\OAuth2\\Adapter\\PdoAdapter',
        'db' => array(
            'dsn_type' => 'PDO',
            'dsn' => 'mysql:dbname=OAUTH2_DATABASE_PLACEHOLDER;host=localhost',
            'username' => 'OAUTH2_USER_PLACEHOLDER',
            'password' => 'OAUTH2_PASSWORD_PLACEHOLDER',
        ),
    ),
    'router' => array(
        'routes' => array(
            'oauth' => array(
                'options' => array(
                    'route' => '/on-the-go-api/oauth',
                ),
            ),
        ),
    ),
);
