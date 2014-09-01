<?php
namespace OnTheGo;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'client.http' => 'Zend\Http\Client',
                'service.uri' => 'Zend\Uri\Http',
            ),
        );
    }
}
