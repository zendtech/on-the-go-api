<?php
namespace OnTheGo\V1\Rest\MonitorIssue;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class MonitorIssueResource extends AbstractResourceListener
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
    
    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $response = $this->webapicall->request('monitorGetIssueDetails', array('issueId' => $id));
        return $response->responseData->issue;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $limit = $this->getEvent()->getRequest()->getQuery('limit', false);
        $parameters = array('filterId' => 'All Issues');
        if ($limit) {
            if ($limit < 2) {
                return new ApiProblem(400, 'Limit shall be greater than 1');
            }
            $parameters['limit'] = $limit;
        }
        $response = $this->webapicall->request('monitorGetIssuesByPredefinedFilter', $parameters);
        return $response->responseData->issues;
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }
}
