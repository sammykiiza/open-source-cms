<?php
declare(strict_types=1);

namespace App\Value;

use App\Value\AbstractValue;
use Doctrine\ORM\Id\UuidGenerator;
use Ramsey\Uuid\Uuid;

class Id extends AbstractValue
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        # code...
    }

    /**
     * @param string $string
     * @return Id
     */
    public static function fromString(string $string): Id
    {
        return new Id($string);
    }

    /**
     * @return Id
     */
    public static function current(): Id
    {
        return self::fromString('current Id');
    }

    /**
     * @return Id
     */
    public static function fromRandom(): Id
    {
        return new Id((string)Uuid::uuid4());
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
