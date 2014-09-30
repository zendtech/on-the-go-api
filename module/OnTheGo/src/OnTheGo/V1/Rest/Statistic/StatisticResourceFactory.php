<?php
namespace OnTheGo\V1\Rest\Statistic;

class StatisticResourceFactory
{
    public function __invoke($services)
    {
        return new StatisticResource($services->get('service.webapicall'));
    }
}
