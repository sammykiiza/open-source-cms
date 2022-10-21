<?php 
declare(strict_types=1);

namespace App\Value\EmailAddress;

class EmailAddressFactory
{
    public function generateFromValue(string $value): EmailAddress
    {
        return EmailAddress::fromValue($value);
    }
}

?>