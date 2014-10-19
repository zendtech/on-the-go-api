<?php
namespace OnTheGo\V1\Rpc\ShareIssue;

use Zend\Mvc\Controller\AbstractActionController;

class ShareIssueController extends AbstractActionController
{
    /**
     * 
     * @var \ZF\OAuth2\Adapter\PdoAdapter
     */
    protected $pdoAdapter;
    
    public function __construct($adapter)
    {
        $this->pdoAdapter = $adapter;
    }   
     
    public function shareIssueAction()
    {
        $identity = $this->getEvent()->getParam('ZF\MvcAuth\Identity');
        if ($identity instanceof \ZF\MvcAuth\Identity\AuthenticatedIdentity) {
            $userId = $identity->getAuthenticationIdentity()['user_id'];
            $user = $this->pdoAdapter->getUserDetails($userId);
        } else {
            //TODO : ApiProblem because no identity
        }
        
        $data = $this->bodyParams();
        $id = $this->params()->fromRoute('id');
        $data['issueId'] = $id;
        $data['sender'] = trim($user['first_name'] . ' ' . $user['last_name']);
        $jq = new \ZendJobQueue();
        $url = $this->url()->fromRoute('application/default', array('controller' => 'mail', 'action' => 'send'));
        $jobId = $jq->createHttpJob($url, $data, array());
        return compact('jobId');
    }
}
