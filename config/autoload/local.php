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
function explodeParams($value) {
    $params = array();
    $explodedParams = explode(',', $value);
    foreach ($explodedParams as $exploded) {
        $param = explode('=', $exploded);
        if (count($param) == 2) {
            $params[$param[0]] = $param[1];
        }
    }
    return $params;
}