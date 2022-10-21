<?php 
declare(strict_types=1);

namespace App\Value\DateTime;
use App\Value\AbstractValue;
use DateTime;
use DateInterval;

class DateTimeValue extends AbstractValue
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function dateNow(): string
    {
        $date = new DateTime('now');
        return $date->format('Y-m-d');
    }

    public static function fromValue(string $value): self
    {
        return new DateTimeValue($value);
    }

    /**
     * Get the difference between two dates to create a DateTimeValue interval in days
     * @param DateTime $date1 The start date
     * @param DateTime $date2 The end date
     */
    public static function interval(DateTime $date1, DateTime $date2): self
    {
        $interval = $date2->diff($date1);
        $days = $interval->format('%D');
        return DateTimeValue::fromValue($days);
    }

    /**
     * Add a duration to a date
     * @param DateTime $date Date to be added on
     * @param string $addtionTime The time to be added onto the date e.g P1M , P10D, P1Y
     */
    public static function addTime(DateTime $date, string $additionTime): DateTime
    {
        return $date->add(new DateInterval($additionTime));
    }

    /**
     * Convert a given DateTimeValue Object to DateTime mostly for manuplation purposes
     */
    public static function convertToDateTime(DateTimeValue $date): DateTime
    {
        return new DateTime($date->getValue());
    }

    public function getValue(): string
    {
        return $this->value;
    }
}


?>