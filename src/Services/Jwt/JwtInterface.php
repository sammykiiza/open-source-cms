<?php
declare(strict_types=1);

namespace App\Services\Jwt;

interface JwtInterface
{
    /**
     * Creates an array of values to be encoded with a json web token.
     */
    public function toJwtArray(): array;
}