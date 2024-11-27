<?php

namespace App\Twig;

use App\GreetingGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GreetExtension extends AbstractExtension
{

    public function __construct(
        private GreetingGenerator $greetingGenerator
    )
    {
    }

    public function getFilters(): array
    {
        return [
          new TwigFilter('greet', [$this, 'greetUser']),
        ];
    }

    public function greetUser(string $name): string
    {
        $greeting = $this->greetingGenerator->getRandomGreeting();

        return "$greeting $name!";
    }

}