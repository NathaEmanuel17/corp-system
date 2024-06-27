<?php

namespace App\Services;

class GenericsFunctions
{
    public static function generatePassword() 
    {
        return fake()->password(8, 8);
    }
    
}
