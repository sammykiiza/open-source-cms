<?php
declare(strict_types=1);

namespace App\Value;

class DateTime extends AbstractValue
{
    private DateTime $value;

    public function __construct(DateTime $value)
    {
    }

    /**
     * get the current date
     * @return string
     */
    public static function dateNow() : string
    {
        return date('U');
    }

    public function getValue(): DateTime
    {
        return $this->value;
    }
}
?>