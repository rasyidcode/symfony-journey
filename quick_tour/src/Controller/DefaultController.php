<?php

namespace App\Controller;

use App\GreetingGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{

    #[Route('/hello/{name}', name: 'index', methods: ['GET'])]
    public function index(string $name, LoggerInterface $logger, GreetingGenerator $generator): Response
    {
        $greeting = $generator->getRandomGreeting();

        $logger->info("Saying $greeting to $name!");

        return $this->render('default/index.html.twig', [
            'name' => $name
        ]);
    }

    #[Route('/simplicity', methods: ['GET'])]
    public function simple(): Response
    {
        return new Response('Simple! Easy! Great!');
    }

    #[Route('/api/hello/{name}', methods: ['GET'])]
    public function apiHello(string $name): JsonResponse
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks'
        ]);
    }

}