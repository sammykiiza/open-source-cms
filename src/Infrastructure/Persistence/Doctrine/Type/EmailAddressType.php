<?php 
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;
use App\Entities\Exception\InvalidArgumentException;
use App\Value\EmailAddress\EmailAddress;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class EmailAddressType extends GuidType
{
    const MY_TYPE = 'email_address';

    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array $fieldDeclaration The field declaration.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        return new EmailAddress($value);
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed|null|string
     * @throws InvalidArgumentException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof EmailAddress) {
            return parent::convertToDatabaseValue($value->getValue(), $platform);
        }
        if (is_string($value)) {
            return parent::convertToDatabaseValue($value, $platform);
        }
        throw new InvalidArgumentException(
            'Cannot put value in database it is not of type EmailAddress'
        );

    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::MY_TYPE;
    }

    /**
     * @param AbstractPlatform $platform
     * @return bool
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}

?>