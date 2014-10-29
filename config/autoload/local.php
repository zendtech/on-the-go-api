<?php
return array(
    'zend-server' => array(
        'key' => 'demo', // 'KEY_PLACEHOLDER',
        'hash' => '05e32a36e4a573ec127f6886910bb6928e76405e7a8fbfbe461a5eba3756e66b', // 'HASH_PLACEHOLDER',
    ),
    'zf-oauth2' => array(
        'storage' => 'ZF\\OAuth2\\Adapter\\PdoAdapter',
        'db' => array(
            'dsn_type' => 'PDO',
            'dsn' => 'mysql:dbname=otg-oauth2;host=127.0.0.1',
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

