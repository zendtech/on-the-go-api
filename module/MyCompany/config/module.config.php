<?php
return array(
    'router' => array(
        'routes' => array(
            'my-company.rest.customers' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customers[/:id]',
                    'defaults' => array(
                        'controller' => 'MyCompany\\V1\\Rest\\Customers\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'my-company.rest.customers',
        ),
    ),
    'zf-rest' => array(
        'MyCompany\\V1\\Rest\\Customers\\Controller' => array(
            'listener' => 'MyCompany\\V1\\Rest\\Customers\\CustomersResource',
            'route_name' => 'my-company.rest.customers',
            'route_identifier_name' => 'id',
            'collection_name' => 'customers',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'MyCompany\\V1\\Rest\\Customers\\CustomersEntity',
            'collection_class' => 'MyCompany\\V1\\Rest\\Customers\\CustomersCollection',
            'service_name' => 'Customers',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'MyCompany\\V1\\Rest\\Customers\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'MyCompany\\V1\\Rest\\Customers\\Controller' => array(
                0 => 'application/vnd.my-company.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'MyCompany\\V1\\Rest\\Customers\\Controller' => array(
                0 => 'application/vnd.my-company.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'MyCompany\\V1\\Rest\\Customers\\CustomersEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'my-company.rest.customers',
                'route_identifier_name' => 'id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'MyCompany\\V1\\Rest\\Customers\\CustomersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'my-company.rest.customers',
                'route_identifier_name' => 'id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'MyCompany\\V1\\Rest\\Customers\\CustomersResource' => array(
                'adapter_name' => 'DB\\Customers',
                'table_name' => 'Customers',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'MyCompany\\V1\\Rest\\Customers\\Controller',
                'entity_identifier_name' => 'id',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'MyCompany\\V1\\Rest\\Customers\\Controller' => array(
            'input_filter' => 'MyCompany\\V1\\Rest\\Customers\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'MyCompany\\V1\\Rest\\Customers\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            1 => array(
                'name' => 'location',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => false,
            ),
            2 => array(
                'name' => 'activity',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => false,
            ),
            3 => array(
                'name' => 'phone',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => false,
            ),
        ),
    ),
);
