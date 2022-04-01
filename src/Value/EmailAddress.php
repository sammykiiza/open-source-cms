<?php 
declare(strict_types=1);

namespace App\Value;
use App\Value\AbstractValue;

class EmailAddress extends AbstractValue
{
    /**
     * @var string
     */
    private string $value;

    /**
     * Email Address Class Constructor
     * @param string $value
     */
    public function __construct(string $value)
    {
    }

    /**
     * Sanitize the email address
     * @param string $email
     * @return mixed
     */
    public function sanitize(string $email) : mixed
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
     * @param string $value
     * @return EmailAddress
     */
    public function fromHtmlInput(string $value): self
    {
        $sanitized = $this->sanitize($value);
        return new EmailAddress($sanitized);
    }

    /**
     * Generate an email address mostly for test purposes
     * @return EmailAddress
     */
    public function email(): EmailAddress
    {
        return new EmailAddress('email@email.com');
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
?>