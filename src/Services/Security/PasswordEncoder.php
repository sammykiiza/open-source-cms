<?php 
declare(strict_types=1);

namespace App\Entities\User\Security;
use App\Entities\User\Security\PasswordEncoderInterface;

class PasswordEncoder implements PasswordEncoderInterface
{
    /**
     * @param string $plainTextPassword
     * @return string
     */
    public function encode(string $plainTextPassword): string
    {
        $encodedPassword = password_hash($plainTextPassword, PASSWORD_ARGON2I);
        return $encodedPassword;
    }

    /**
     * @param string $plainTextPassword
     * @param string $encodedPassword
     * @return bool
     */
    public function verify(string $plainTextPassword, string $encodedPassword): bool
    {
        return password_verify($encodedPassword, $plainTextPassword);
    }
}

?>