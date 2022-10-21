<?php
declare(strict_types=1);

namespace App\Services\Jwt;

use App\Services\Jwt\JsonWebKey\JsonWebKey;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;


class JwtEncoder
{  
    public function generate(): string
    {
        $algorithmManager  = new AlgorithmManager([
            new HS256(),
        ]);
        
        $jwk = JsonWebKey::createFromSecretKey();

        $jwsBuilder = new JWSBuilder($algorithmManager);

        $payload = json_encode([
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
            'iss' => 'open-source-cms-api',
            'aud' => 'Your application',
        ]);

        $jws = $jwsBuilder
                ->create()
                ->withPayload($payload)
                ->addSignature($jwk, ['alg' => 'HS256'])
                ->build();

        $serializer = new CompactSerializer();

        return $serializer->serialize($jws, 0);
    }
}
