<?php
return array(
    'zend-server' => array(
        'key' => 'demo', // 'KEY_PLACEHOLDER',
        'hash' => 'd6e5c2b0324b34db6f69e3fce67ecb3d70520dd3a14fe612890248983633aff1', // 'HASH_PLACEHOLDER',
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

