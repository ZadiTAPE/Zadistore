<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class NmReader extends Constraint
{
    public string $message = 'La valeur "{{ value }}" n\'est pas valide.';
}