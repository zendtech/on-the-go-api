<?php
namespace OnTheGo\Services;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 *
 * @author julien
 *        
 */
class MailFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $resource = $serviceLocator->get('OnTheGo\\V1\\Rest\\MonitorIssue\\MonitorIssueResource');
        return new Mail($resource);
    }
}
