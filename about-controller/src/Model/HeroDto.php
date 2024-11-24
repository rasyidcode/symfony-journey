<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class HeroDto
{

    public function __construct(
        #[Assert\NotBlank]
        public string $name = '{unknown_hero}',
        #[Assert\NotBlank]
        #[Assert\Choice(choices: ['Strength', 'Agility', 'Intelligence', 'Universal'], message: 'Choose a valid attribute')]
        public string $attribute = '{unknown_attribute}',
    )
    {
    }

}