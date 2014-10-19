<?php
namespace OnTheGo\V1\Rpc\Statistics;

use Zend\Mvc\Controller\AbstractActionController;

class StatisticsController extends AbstractActionController
{
    /**
     *
     * @var \OnTheGo\Services\WebApiCall
     */
    protected $webapicall;
    
    /**
     * Constructor
     *
     * @param \OnTheGo\Services\WebApiCall $service
     * @return void
     */
    public function __construct($service)
    {
        $this->webapicall = $service;
    }
    
    public function statisticsAction()
    {
        $type = $this->params()->fromQuery('type', false);
        $from = $this->params()->fromQuery('from', false);
        $to = $this->params()->fromQuery('to', false);
        $response = $this->webapicall->request('statisticsGetSeries', compact('type', 'from', 'to'));
        return array('result' => $response->responseData->series);
    }
}
