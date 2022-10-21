<?php 
declare(strict_types=1);

namespace App\Value\DateTime;
use DateTime;

class DateTimeValueFactory
{
    public function generateDateNow(): string
    {
        return DateTimeValue::dateNow();
    }

    public function generateFromValue(string $date): DateTimeValue
    {
        return DateTimeValue::fromValue($date);
    }

    public static function convertToDateTime(DateTimeValue $date): DateTime
    {
        return DateTimeValue::convertToDateTime($date);
    }

    public function generateInterval(DateTimeValue $date1, DateTimeValue $date2): DateTimeValue
    {
        $dateOneToDateTime = DateTimeValueFactory::convertToDateTime($date1);
        $dateTwoToDateTime = DateTimeValueFactory::convertToDateTime($date2);

        return DateTimeValue::interval($dateOneToDateTime, $dateTwoToDateTime);
    }
}

?>