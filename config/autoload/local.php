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
);
