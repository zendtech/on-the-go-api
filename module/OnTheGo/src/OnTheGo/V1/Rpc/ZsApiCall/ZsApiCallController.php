<?php
namespace OnTheGo\V1\Rpc\ZsApiCall;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ApiProblem\ApiProblemResponse;
use ZF\ApiProblem\ApiProblem;

class ZsApiCallController extends AbstractActionController
{
    public function zsApiCallAction()
    {
        $inputFilter = $this->getEvent()->getParam('ZF\ContentValidation\InputFilter');
        $data = $inputFilter->getValues();
        $config = $this->getServiceLocator()->get('config');
        if (!isset($config['zend-server']) || (!isset($config['zend-server']['key']) || !isset($config['zend-server']['hash']))) {
            return new ApiProblemResponse(new ApiProblem(500, 'Cannot retrieve Server credentials'));
        } 
        
        $data['host'] = 'http://localhost:10081/ZendServer';
        if (!isset($data['method'])) {
            $data['method'] = 'GET';
        }
        $date = gmdate('D, d M Y H:i:s ', time()) . 'GMT';
        $userAgent = "ZSWebApi". ucfirst($data['action']) . "/1.0";
        $uri = $this->getServiceLocator()->get('service.uri');
        $uri->parse($data['host']);
        $concat = $uri->getHost() . ':' . $uri->getPort() . ':' . $uri->getPath() . '/Api/' . $data['action'] . ':' . $userAgent . ':' . $date;
        $signature = hash_hmac('sha256', $concat, $config['zend-server']['hash']);
        
        $client = $this->getServiceLocator()->get('client.http');
        $client->setUri($data['host'] . '/Api/' . $data['action'])
               ->setMethod($data['method'])
               ->setOptions(array(
                    'timeout' => 60,
                ))
               ->setHeaders(array(
                    'Date' => $date,
                    'User-Agent' => $userAgent,
                    'X-Zend-Signature' => $config['zend-server']['key'] . ';' . $signature,
                    'Accept' => 'application/vnd.zend.serverapi+json'
                ));
        if (count($data['params']) > 0) {
            ($data['method'] == 'GET') ? $client->setParameterGet($data['params']) : $client->setParameterPost($data['params']);
        }
        $response = $client->send();
        $content = $response->getBody();
        $content = str_replace("\n", "", $content);
        return array("result" => $content);
    }
}
