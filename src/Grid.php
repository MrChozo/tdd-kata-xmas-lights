<?php

namespace App;

class Grid
{
    public int $xMax = 999;
    public int $xMin = 0;

    public int $yMax = 999;
    public int $yMin = 0;

    public int $unitSize = 1;

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
     * ---- OR.... ----
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


    }

    public function lightOnAtLocation(int $x, int $y)
    {

    }


}