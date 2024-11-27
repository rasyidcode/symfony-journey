<?php

namespace App;

class GreetingGenerator
{

    public function getRandomGreeting(): string
    {
        $greetings = ['Hello', 'Yo', 'Aloha'];

        return $greetings[array_rand($greetings)];
    }

}