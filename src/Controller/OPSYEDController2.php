<?php
// src/Controller/OPSYEDController2.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ServiceFactory;

class OPSYEDController2 extends AbstractController
{
    private ServiceFactory $serviceFactory;

    public function __construct(ServiceFactory $serviceFactory)
    {
        $this->serviceFactory = $serviceFactory;
    }

    /**
     * Bridge function to by-pass the symfony 4.4 restrictions
     * on calling private services by id from the service container on the controller level
     * @param serviceId the serviceId we want to get
     * @return service the new service object from the service container
     */
    protected function get(string $serviceId): object
    {
        return $this->serviceFactory->getService($serviceId);
    }
}
