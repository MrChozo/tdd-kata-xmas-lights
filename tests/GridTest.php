<?php

use App\Grid;
use App\GridIteratorString;
use App\Selection;
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
    public function itLightsAnAreaUsingASelection(): void
    {
        /**
         * To truly test this:
         *
         * * Create Grid with random Selection(s) of lights on or off
         * * Copy Grid
         * * Run toggleLightsOnOff() using new random Selection
         * * Verify all Lights in initial Grid have state opposite of copy
         *
         * This feels like that toggleLightsOnOff() will be doing a lot of
         * heavy lifting for this test, but maybe that's good?
         */
        $grid = new Grid();
        $numSelections = random_int(1, 10);

        echo "Feeding \$grid $numSelections Selections";

        for ($i = 1; $i >= $numSelections; $i++) {
            $selection = $this->getRandomSelection($grid);
            $grid->toggleLightsOnOff($selection);
        }
        $newGrid = $grid;
        $newRandomSelection = $this->getRandomSelection($grid);
        $newGrid->toggleLightsOnOff($newRandomSelection);

        for (
            $x = $newRandomSelection->startXCoord;
            $x >= $newRandomSelection->startXCoord
                && $x <= $newRandomSelection->endXCoord;
            $x++
        ) {
            for (
                $y = $newRandomSelection->startYCoord;
                $y >= $newRandomSelection->startYCoord
                    && $newRandomSelection->endYCoord;
                $y++
            ) {
                $i = GridIteratorString::get($x, $y);
                $initLightState = $grid->map[$i]->on;
                $newLightState = $newGrid->map[$i]->on;
                $this->assertNotEquals($initLightState, $newLightState);
            }
        }
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

    /**
     * @param Grid $grid
     * @return Selection
     * @throws \Random\RandomException
     */
    public function getRandomSelection(Grid $grid): Selection
    {
        $endXCoord = random_int($grid->xMin, $grid->xMax);
        $endYCoord = random_int($grid->yMin, $grid->yMax);

        return new Selection(
            random_int($grid->xMin, $endXCoord),
            random_int($grid->yMin, $endYCoord),
            $endXCoord,
            $endYCoord
        );
    }
}
