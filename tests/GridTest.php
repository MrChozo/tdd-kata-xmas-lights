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
     * @throws \Random\RandomException
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

        echo "Feeding \$grid $numSelections Selections\n\n";

        for ($i = 1; $i <= $numSelections; $i++) {
            echo "Selection #$i: ";
            $selection = $this->getRandomSelection($grid);
            $this->displaySelection($selection);
            $grid->toggleLightsOnOff($selection);
        }
        $newGrid = clone $grid;
        $newRandomSelection = $this->getRandomSelection($grid);

        echo "New Random Selection: ";
        $this->displaySelection($newRandomSelection);

        $newGrid->toggleLightsOnOff($newRandomSelection);

        // Perform comparison
        for (
            $x = $newRandomSelection->startXCoord;
            $x >= $newRandomSelection->startXCoord
                && $x <= $newRandomSelection->endXCoord;
            $x++
        ) {
            for (
                $y = $newRandomSelection->startYCoord;
                $y >= $newRandomSelection->startYCoord
                    && $y <= $newRandomSelection->endYCoord;
                $y++
            ) {
                $i = GridIteratorString::get($x, $y);

                $initLight = $grid->map[$i];
                $initLightState = $initLight->on;

                $newLight = $newGrid->map[$i];
                $newLightState = $newLight->on;

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
        $x = 3;
        $y = 2;
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

    private function displaySelection(Selection $selection): void
    {
        echo "($selection->startXCoord, $selection->startYCoord) to ($selection->endXCoord, $selection->endYCoord)\n";
    }
}
