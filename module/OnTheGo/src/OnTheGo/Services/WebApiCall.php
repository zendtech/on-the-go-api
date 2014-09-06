<?php
namespace OnTheGo\Services;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
/**
 *
 * @author julien
 *        
 */
class WebApiCall implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
    
    /**
     * 
     * @param string $action
     * @param array $params
     */
    public function request($action, $params = array(), $method = 'GET') 
    {
        $config = $this->getServiceLocator()->get('config');
        $date = gmdate('D, d M Y H:i:s ', time()) . 'GMT';
        $userAgent = "ZSWebApi". ucfirst($action) . "/1.0";
        $uri = $this->getServiceLocator()->get('service.uri');
        $uri->parse($config['zend-server']['url']);
        $concat = $uri->getHost() . ':' . $uri->getPort() . ':' . $uri->getPath() . '/Api/' . $action . ':' . $userAgent . ':' . $date;
        $signature = hash_hmac('sha256', $concat, $config['zend-server']['hash']);
        
        $client = $this->getServiceLocator()->get('client.http');
        $client->setUri($config['zend-server']['url'] . '/Api/' . $action)
               ->setMethod($method)
               ->setOptions(array(
                    'timeout' => 60,
        ))
        ->setHeaders(array(
            'Date' => $date,
            'User-Agent' => $userAgent,
            'X-Zend-Signature' => $config['zend-server']['key'] . ';' . $signature,
            'Accept' => 'application/vnd.zend.serverapi+json'
        ));
        if (count($params) > 0) {
            ($method == 'GET') ? $client->setParameterGet($params) : $client->setParameterPost($params);
        }
        $response = $client->send();
        $content = $response->getBody();
        return json_decode($content);
    }
}
