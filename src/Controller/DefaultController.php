<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends OPSYEDController1
{

    /**
     * @Route("/home", name="blog_list", methods={"GET"})
     */
    public function list(): Response
    {
        $test = $this->get('message.generator');
        $message = $test->getHappyMessage();
        $res = new Response($message, 200);
        return $res;
    }
}
