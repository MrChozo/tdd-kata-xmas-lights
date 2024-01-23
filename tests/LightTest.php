<?php


use App\Light;
use PHPUnit\Framework\TestCase;

class LightTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function itIsEitherOnOrOff(): void
    {
        $light = new Light();
        $this->assertTrue(
            ($light->on === true || $light->on === false)
        );
    }

    /**
     * @test
     * @return void
     */
    public function itTurnsOff(): void
    {
        $light = new Light();
        $light->turnOn();
        $light->turnOff();
        $this->assertFalse($light->on);
    }

    /**
     * @test
     * @return void
     */
    public function itTurnsOn(): void
    {
        $light = new Light();
        $light->turnOn();
        $this->assertTrue($light->on);
    }

    /**
     * @test
     * @return void
     */
    public function itsXLocationCanBeSet(): void
    {
        $x = 5;
        $light = new Light();
        $light->setXLocation($x);
        $this->assertEquals($x, $light->xLocation);
    }

    /**
     * @test
     * @return void
     */
    public function itsYLocationCanBeSet(): void
    {
        $y = 239;
        $light = new Light();
        $light->setYLocation($y);
        $this->assertEquals($y, $light->yLocation);
    }

    /**
     * @test
     * @return void
     */
    public function itsDefaultLocationIsZeroCommaZero(): void
    {
        $light = new Light();
        $this->assertEquals('(0, 0)', $light->getLocation());
    }
}
