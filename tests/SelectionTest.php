<?php


use App\Grid;
use App\Selection;
use PHPUnit\Framework\TestCase;

class SelectionTest extends TestCase
{

    /**
     * @test
     * @return void
     */
    public function itsCoordsAreInbounds(): void
    {
        $startXCoord = 0;
        $startYCoord = 0;
        $endXCoord = 0;
        $endYCoord = 0;

        $grid = new Grid();
        $selection = new Selection(
            $startXCoord,
            $startYCoord,
            $endXCoord,
            $endYCoord
        );
        $coords = [
            $selection->startXCoord,
            $selection->startYCoord,
            $selection->endXCoord,
            $selection->endYCoord,
        ];
        foreach ($coords as $coord) {
            $this->assertTrue(($coord <= $grid->xMax));
            $this->assertTrue(($coord >= $grid->xMin));
            $this->assertTrue(($coord <= $grid->yMax));
            $this->assertTrue(($coord >= $grid->yMin));
        }
    }
}
