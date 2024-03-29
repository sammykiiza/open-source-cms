<?php 
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;
use Doctrine\DBAL\Types\GuidType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use App\Value\DateTime\DateTimeValue;
use App\Entities\Exception\InvalidArgumentException;

class DateTimeType extends GuidType
{
    const MY_TYPE = 'date_time';

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

        return new DateTimeValue($value);
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

        if ($value instanceof DateTimeValue) {
            return parent::convertToDatabaseValue($value->getValue(), $platform);
        }
        if (is_string($value)) {
            return parent::convertToDatabaseValue($value, $platform);
        }
        throw new InvalidArgumentException(
            'Cannot put value in database it is not of type DateTime'
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