<?php
return array(
    'zend-server' => array(
        'key' => 'KEY_PLACEHOLDER',
        'hash' => 'HASH_PLACEHOLDER',
    ),
    'zf-oauth2' => array(
        'storage' => 'ZF\\OAuth2\\Adapter\\PdoAdapter',
        'db' => array(
            'dsn_type' => 'PDO',
            'dsn' => 'mysql:dbname=oauth2;host=127.0.0.1',
            'username' => 'root',
            'password' => 'root',
        ),
    ),
    'router' => array(
        'routes' => array(
            'oauth' => array(
                'options' => array(
                    'route' => '/oauth',
                ),
            ),
        ),
    ),
);

