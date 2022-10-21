<?php 
declare(strict_types=1);

namespace App\Services\Jwt\JsonWebKey;
use Jose\Component\Core\JWK;
use Jose\Component\KeyManagement\JWKFactory;

class JsonWebKey
{
    public static function createFromSecretKey(): JWK
    {
        return JWKFactory::createFromSecret(
            $_ENV['SECRET_KEY'],
            [
                'alg' => 'HS256',
                'use' => 'sig'
            ]
        );
    }
}

?>