<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends OPSYEDController2
{

    /**
     * @Route("/home", name="home_route", methods={"GET"})
     */
    public function list(): Response
    {
        $test = $this->get('message.generator');
        $message = $test->getHappyMessage();
        $res = new Response($message, 200);
        return $res;
    }
}
