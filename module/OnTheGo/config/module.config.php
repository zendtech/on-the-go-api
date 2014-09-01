<?php
return array(
    'controllers' => array(
        'factories' => array(
            'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => 'OnTheGo\\V1\\Rpc\\ZsApiCall\\ZsApiCallControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'on-the-go.rpc.zs-api-call' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/zsapicall',
                    'defaults' => array(
                        'controller' => 'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller',
                        'action' => 'zsApiCall',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'on-the-go.rpc.zs-api-call',
        ),
    ),
    'zf-rpc' => array(
        'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => array(
            'service_name' => 'ZsApiCall',
            'http_methods' => array(
                0 => 'POST',
            ),
            'route_name' => 'on-the-go.rpc.zs-api-call',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'OnTheGo\\V1\\Rpc\\ZsApiCall\\Controller' => array(
            'input_filter' => 'OnTheGo\\V1\\Rpc\\ZsApiCall\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'OnTheGo\\V1\\Rpc\\ZsApiCall\\Validator' => array(
            0 => array(
                'name' => 'action',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'error_message' => 'A valid WebAPI method name is required',
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            1 => array(
                'name' => 'params',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\Callback',
                        'options' => array(
                            'callback' => 'explodeParams',
                        ),
                    ),
                ),
                'validators' => array(),
                'error_message' => 'Please provide with key and values in this format : key1=value1, key2=value2',
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
        ),
    ),
);