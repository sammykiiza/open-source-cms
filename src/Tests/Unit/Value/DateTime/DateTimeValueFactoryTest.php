<?php 
declare(strict_types=1);

namespace Tests\App\Value\DateTime;
use PHPUnit\Framework\TestCase;
use App\Value\DateTime\DateTimeValue;
use App\Value\DateTime\DateTimeValueFactory;

/**
 * @covers DateTimeValueFactory
 */
class DateTimeValueFactoryTest extends TestCase
{
    public function testGenerateInterval(): void
    {
        $dateNow = DateTimeValue::dateNow();
        $date1 = DateTimeValue::fromValue($dateNow);
        $date2 = DateTimeValue::fromValue('2022-06-03');
        $interval = DateTimeValue::fromValue('10');

        $factory = $this->createMock(DateTimeValueFactory::class);

        $factory->expects(self::once())
        ->method('generateInterval')
        ->with(self::equalTo($date1), self::equalTo($date2))
        ->will(self::returnValue($interval));

        $factory->generateInterval($date1, $date2);

        $realFactory = new DateTimeValueFactory();
        $actualValue = $realFactory->generateInterval($date1, $date2);

        self::assertEquals($actualValue, $interval);
    }
}

?>