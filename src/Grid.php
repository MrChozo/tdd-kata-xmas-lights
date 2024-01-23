<?php

namespace App;

class Grid
{
    public int $xMax = 999;
    public int $xMin = 0;

    public int $yMax = 999;
    public int $yMin = 0;

    public int $unitSize = 1;

    // TODO: Move to Selection StdObject?
    public int $startXCoord = 0;
    public int $startYCoord = 0;
    public int $endXCoord = 0;
    public int $endYCoord = 0;

    /**
     * [
     *    [000, 000],
     *    [000, 001],
     *    [000, 002],
     *    ..........,
     *    [999, 999],
     * ]
     *
     * ---- OR ... ----
     * [
     *     Light#0 (contains x and y coords),
     *     Light#1,
     *     Light#2,
     *     ...,
     *  ]
     * @var array
     */
    public array $map = [];

    public function __construct()
    {
        $this->initializeGridMap();
    }

    public function lightOnAtLocation(int $x, int $y)
    {
        foreach ($this->map as $light) {
            if ($light->)
        }
        return false;
    }

    private function initializeGridMap()
    {
        $totalLights = 0;
        for (
            $x = $this->xMin;
            $x >= $this->xMin && $x <= $this->xMax;
            $x++
        ) {
            for (
                $y = $this->yMin;
                $y >= $this->yMin && $y <= $this->yMax;
                $y++
            ) {
                $this->map[] = new Light($x, $y);
                $totalLights++;
            }
        }
        echo "Total number of Light objects created: $totalLights\n";
    }
}