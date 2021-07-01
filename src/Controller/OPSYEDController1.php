<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Service\ServiceFactory;
use Exception;

class OPSYEDController1 extends AbstractController
{
    private ContainerInterface $con;

    public function __construct(ContainerInterface $container)
    {
        $this->con = $container;
        $this->get("test");
    }
    /**
     * Bridge function to by-pass the symfony 4.4 restrictions
     * on calling private services by id from the service container on the controller level
     * @param serviceId the serviceId we want to get
     * @return service the new service object from the service container
     */
    // protected function get(string $serviceId): object
    // {
    //     return $this->getService($serviceId);
    // }

    private function getService($alias)
    {
        if (!$this->hasService($alias)) {
            throw new Exception("Service not found");
        }
        return $this->con->get($alias);
    }

    /**
     * @param $serviceId
     * @return bool
     */
    private function hasService($alias): bool
    {
        return $this->con->has($alias);
    }
}
