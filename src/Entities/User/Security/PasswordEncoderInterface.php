<?php 
declare(strict_types=1);

namespace App\Entities\User\Security;

/**
 * Password Encoding Interface that should be implemented by password encoders
 */
interface PasswordEncoderInterface{

    /**
     * @param string $plainTextPassword
     * @return string
     */
    public function encode(string $plainTextPassword): string;

    /**
     * @param string $plainTextPassword
     * @param string $encodedPassword
     * @return bool
     */
    public function verify(string $plainTextPassword, string $encodedPassword): bool;
}
?>