<?php
namespace OnTheGo\V1\Rpc\Statistics;

class StatisticsControllerFactory
{
    public function __invoke($controllers)
    {
        $services = $controllers->getServiceLocator();
        return new StatisticsController($services->get('service.webapicall'));
    }
}
