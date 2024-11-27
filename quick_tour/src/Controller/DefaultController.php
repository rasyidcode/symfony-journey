<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return new Response('Hello!');
    }

}