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
    public function itsCoordsAreInbounds(): void
    {
        $grid = new Grid();
        $coords = [
            $grid->startXCoord,
            $grid->startYCoord,
            $grid->endXCoord,
            $grid->endYCoord,
        ];
        foreach ($coords as $coord) {
            $this->assertTrue(($coord <= $grid->xMax));
            $this->assertTrue(($coord >= $grid->xMin));
            $this->assertTrue(($coord <= $grid->yMax));
            $this->assertTrue(($coord >= $grid->yMin));
        }
    }

    /**
     * @test
     * @return void
     */
    public function itTellsYouIfALightAtAGivenCoordinateIsOff(): void
    {
        $x = 53;
        $y = 382;
        $grid = new Grid();
        $onOrOff = $grid->lightOnAtLocation($x, $y);
        $this->assertFalse($onOrOff);
    }
}
