<?php
namespace OnTheGo\V1\Rpc\ZsApiCall;

class ZsApiCallControllerFactory
{
    public function __invoke($controllers)
    {
        return new ZsApiCallController();
    }
}
