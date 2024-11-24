<?php

namespace App\Controller;

use App\Model\HeroDto;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
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

    #[Route('/hello/query-params-example')]
    public function queryParamsExample(
        #[MapQueryParameter] string $name,
        #[MapQueryParameter] int    $age,
        #[MapQueryParameter] string $job
    ): Response
    {
        return new Response($name . ' is ' . $age . ' old, and work as ' . $job . '.');
    }

    #[Route('/hello/query-params-example2')]
    public function queryParamsExample2(
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $num1,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $num2
    ): Response
    {
        if ($num1 > $num2) {
            $text = $num1 . ' is bigger than ' . $num2 . '.';
        } else {
            $text = $num1 . ' is smaller or equal to ' . $num2 . '.';
        }

        return new Response($text);
    }

    #[Route('/hello/your-name')]
    public function queryParamsExample3(
        #[MapQueryParameter(filter: \FILTER_VALIDATE_REGEXP, options: ['regexp' => '/^\w+$/'])] string $name
    ): Response
    {
        return new Response('Your name is ' . $name);
    }

    #[Route('/hello/dota-hero')]
    public function queryParamsExample4(
        #[MapQueryString(validationFailedStatusCode: Response::HTTP_UNPROCESSABLE_ENTITY)] HeroDto $heroDto = new HeroDto()
    ): Response
    {
        return new Response($heroDto->name . ' - ' . $heroDto->attribute);
    }
}
