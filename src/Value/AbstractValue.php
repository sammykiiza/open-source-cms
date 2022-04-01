<?php
declare(strict_types=1);

namespace App\Value;
use JsonSerializable;

abstract class AbstractValue implements JsonSerializable
{
    /**
     * @return mixed
     */
    abstract public function getValue(): mixed;


    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return $this->getValue();
    }
}
