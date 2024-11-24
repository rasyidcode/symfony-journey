<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }

    #[Route('/hello/404', name: 'app_hello_404')]
    public function notFound(): Response
    {
        throw $this->createNotFoundException('The page you looking for is not found');
    }

    /**
     * @throws Exception
     */
    #[Route('/hello/something-went-wrong')]
    public function throwError(): Response
    {
        throw new Exception('Something went terribly wrong');
    }
}
