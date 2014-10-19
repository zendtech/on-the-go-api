<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 *
 * @author julien
 *        
 */
class MailController extends AbstractActionController
{
    /**
     * 
     * @var \OnTheGo\V1\Rest\MonitorIssue\MonitorIssueResource
     */
    protected $issueResource;
    
    public function __construct($resource)
    {
        $this->issueResource = $resource;
    }
    
    public function sendAction()
    {
        $params = \ZendJobQueue::getCurrentJobParams();
        $issue = $this->issueResource->fetch($params['issueId']);
        unset($params['issueId']);
        $params['issue'] = $issue;
        return false;
    }
}
