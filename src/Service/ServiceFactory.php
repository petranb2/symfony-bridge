<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceFactory
{

    private ContainerInterface $container;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Bridge function to by-pass the symfony 4.4 restrictions on calling services by id from the service container
     * @param serviceId the serviceId we want to get
     * @return service the new service object from the service container
     */
    public function getService($alias): object
    {
        if (!$this->hasService($alias)) {
            throw new Exception("Service not found");
        }
        return $this->container->get($alias);
    }

    /**
     * @param $serviceId
     * @return bool
     */
    public function hasService($alias): bool
    {
        return $this->container->has($alias);
    }
}
