<?php
return array(
    'controllers' => array(
        'factories' => array(
            'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => 'OnTheGo\\V1\\Rpc\\Statistics\\StatisticsControllerFactory',
            'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => 'OnTheGo\\V1\\Rpc\\ShareIssue\\ShareIssueControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'on-the-go.rest.monitor-issue' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/monitor-issues[/:monitor_issue_id]',
                    'defaults' => array(
                        'controller' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller',
                    ),
                ),
            ),
            'on-the-go.rpc.statistics' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/statistics',
                    'defaults' => array(
                        'controller' => 'OnTheGo\\V1\\Rpc\\Statistics\\Controller',
                        'action' => 'statistics',
                    ),
                ),
            ),
            'on-the-go.rpc.share-issue' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/share-issue/:id',
                    'defaults' => array(
                        'controller' => 'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller',
                        'action' => 'shareIssue',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            1 => 'on-the-go.rest.monitor-issue',
            0 => 'on-the-go.rpc.statistics',
            2 => 'on-the-go.rpc.share-issue',
        ),
    ),
    'zf-rpc' => array(
        'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => array(
            'service_name' => 'Statistics',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'on-the-go.rpc.statistics',
        ),
        'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => array(
            'service_name' => 'ShareIssue',
            'http_methods' => array(
                0 => 'POST',
            ),
            'route_name' => 'on-the-go.rpc.share-issue',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => 'HalJson',
            'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => 'Json',
            'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
            ),
            'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
            ),
            'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-content-validation' => array(),
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
    'service_manager' => array(
        'factories' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueResource' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
            'listener' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueResource',
            'route_name' => 'on-the-go.rest.monitor-issue',
            'route_identifier_name' => 'monitor_issue_id',
            'collection_name' => 'monitor_issues',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'filter',
                1 => 'sort',
            ),
            'page_size' => 2,
            'page_size_param' => 'limit',
            'entity_class' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueEntity',
            'collection_class' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueCollection',
            'service_name' => 'MonitorIssue',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'on-the-go.rest.monitor-issue',
                'route_identifier_name' => 'monitor_issue_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'on-the-go.rest.monitor-issue',
                'route_identifier_name' => 'monitor_issue_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => false,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'OnTheGo\\V1\\Rpc\\Statistics\\Controller' => array(
                'actions' => array(
                    'statistics' => array(
                        'GET' => true,
                        'POST' => false,
                        'PATCH' => false,
                        'PUT' => false,
                        'DELETE' => false,
                    ),
                ),
            ),
            'OnTheGo\\V1\\Rpc\\ShareIssue\\Controller' => array(
                'actions' => array(
                    'shareIssue' => array(
                        'GET' => false,
                        'POST' => true,
                        'PATCH' => false,
                        'PUT' => false,
                        'DELETE' => false,
                    ),
                ),
            ),
        ),
    ),
);
