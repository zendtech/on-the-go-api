<?php
namespace OnTheGo\V1\Rpc\ShareIssue;

class ShareIssueControllerFactory
{
    public function __invoke($controllers)
    {
        $services = $controllers->getServiceLocator();
        return new ShareIssueController($services->get('ZF\OAuth2\Adapter\PdoAdapter'));
    }
}
