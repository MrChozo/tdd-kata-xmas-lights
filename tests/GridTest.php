<?php

use App\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function itsXAndYMaxesAreGreaterThanItsXAndYMins(): void
    {
        $grid = new Grid();
        $this->assertTrue(($grid->xMax > $grid->xMin));
        $this->assertTrue(($grid->yMax > $grid->yMin));
    }

    /**
     * @test
     * @return void
     */
    public function itsUnitSizeIsGreaterThanZero(): void
    {
        $grid = new Grid();
        $this->assertTrue(($grid->unitSize > 0));
    }

    /**
     * @test
     * @return void
     */
    public function itTellsYouIfALightAtAGivenCoordinateIsOff(): void
    {
        $x = 873;
        $y = 832;
        $grid = new Grid();
        $onOrOff = $grid->lightOnAtLocation($x, $y);
        $this->assertFalse($onOrOff);
    }
}
