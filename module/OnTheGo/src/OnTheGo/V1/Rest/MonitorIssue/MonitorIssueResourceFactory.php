<?php
namespace OnTheGo\V1\Rest\MonitorIssue;

class MonitorIssueResourceFactory
{
    public function __invoke($services)
    {
        return new MonitorIssueResource($services->get('service.webapicall'));
    }
}
