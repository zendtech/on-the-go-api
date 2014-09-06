<?php
return array(
    'controllers' => array(
        'factories' => array(),
    ),
    'router' => array(
        'routes' => array(
            'on-the-go.rest.monitor-issue' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/monitor-issues[/:monitor_issue_id]',
                    'defaults' => array(
                        'controller' => 'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            1 => 'on-the-go.rest.monitor-issue',
        ),
    ),
    'zf-rpc' => array(),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
                0 => 'application/vnd.on-the-go.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'OnTheGo\\V1\\Rest\\MonitorIssue\\Controller' => array(
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
);
