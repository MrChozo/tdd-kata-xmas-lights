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
        $light = new Light(894, 283);
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
        $light = new Light(82, 729);
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
        $light = new Light(0, 34);
        $light->turnOn();
        $this->assertTrue($light->on);
    }

    /**
     * @test
     * @return void
     */
    public function itTogglesOnOff(): void
    {
        $light = new Light(0, 34);
        $init_state = $light->on = (bool)random_int(0, 1); // random state
        $light->toggleOnOff();
        $this->assertNotEquals($init_state, $light->on);
    }

    /**
     * @test
     * @return void
     */
    public function itsXLocationCanBeSet(): void
    {
        $x = 5;
        $light = new Light(42, 2);
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
        $light = new Light(48, 231);
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
        $this->assertEquals([0, 0], $light->getLocation());
    }

    /**
     * @test
     * @return void
     */
    public function itDisplaysDefaultLocationOfZeroCommaZero(): void
    {
        $light = new Light();
        $this->assertEquals('(0, 0)', $light->displayLocationString());
    }
}
