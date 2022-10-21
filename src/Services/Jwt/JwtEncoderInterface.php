<?php
declare(strict_types=1);

namespace App\Services\Jwt;

interface JwtEncoderInterface
{
    /**
     * Encodes json web token and returns encoded token.
     * @param JwtInterface $jsonWebToken
     * @return string
     */
    public function encode(JwtInterface $jsonWebToken): string;

    public function methodName(Type $args): void;
}