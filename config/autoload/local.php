<?php
return array(
    'db' => array(
        'adapters' => array(
            'DB\\Customers' => array(
                'driver' => 'Pdo_Sqlite',
                'database' => 'data/sqlite.db',
            ),
        ),
    ),
    'zend-server' => array(
        'key' => 'demo', // 'KEY_PLACEHOLDER',
        'hash' => 'd6e5c2b0324b34db6f69e3fce67ecb3d70520dd3a14fe612890248983633aff1', // 'HASH_PLACEHOLDER',
    ),
);

