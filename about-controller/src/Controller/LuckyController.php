<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{

    #[Route('/lucky', name: 'app_lucky')]
    public function index(): Response
    {
        return new Response('<html><body>Hello LuckyController!</body></html>');
    }

    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max): Response
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    #[Route('/lucky/number-with-view/{max}', 'app_lucky_number_with_view')]
    public function numberWithView(int $max): Response
    {
        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number
        ]);
    }

    #[Route('/lucky/get-url')]
    public function getURL(): Response
    {
        $url = $this->generateUrl('app_lucky_number', ['max' => 15]);

        return new Response(
            '<html><body>URL: ' . $url . '</body></html>'
        );
    }

    #[Route('/lucky/redirect-example')]
    public function redirectExample(): RedirectResponse
    {
        // redirect to the "app_lucky"
        return $this->redirectToRoute('app_lucky');
    }

    #[Route('/lucky/redirect-example2')]
    public function redirectExample2(): RedirectResponse
    {
        // shortcut for $this->redirect('app_lucky')
        return new RedirectResponse($this->generateUrl('app_lucky'));
    }

    #[Route('/lucky/redirect-example3')]
    public function redirectExample3(): RedirectResponse
    {
        // does a permanent HTTP 301 redirect
        return $this->redirectToRoute('app_lucky', [], 301);
    }

    #[Route('/lucky/redirect-example4')]
    public function redirectExample4(): RedirectResponse
    {
        // Use PHP constant instead of hardcoded numbers
        return $this->redirectToRoute('app_lucky', [], Response::HTTP_MOVED_PERMANENTLY);
    }

    #[Route('/lucky/redirect-example5')]
    public function redirectExample5(): RedirectResponse
    {
        // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 15]);
    }

    #[Route('/lucky/redirect-example6')]
    public function redirectExample6(Request $request): RedirectResponse
    {
        // redirects to a route and maintains the original query string parameters
        return $this->redirectToRoute('app_lucky_number', $request->query->all());
    }

    #[Route('/lucky/redirect-example7')]
    public function redirectExample7(Request $request): RedirectResponse
    {
        // redirects to the current route (e.g. for Post/Redirect/Get pattern)
        return $this->redirectToRoute($request->attributes->get('_route'));
    }

    #[Route('/lucky/redirect-example8')]
    public function redirectExample8(): RedirectResponse
    {
        // redirects externally
        return $this->redirect('https://symfony.com/doc');
    }

    #[Route('/lucky/logging-example')]
    public function loggingExample(LoggerInterface $logger): Response
    {
        $logger->info('Logging example');
        $logger->info('We are doing logging!');

        return new Response('Logging example');
    }
}
