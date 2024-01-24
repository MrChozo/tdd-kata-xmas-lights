<?php

namespace App;

class Grid
{
    public int $xMax = 999;
    public int $xMin = 0;

    public int $yMax = 999;
    public int $yMin = 0;

    public int $unitSize = 1;

    /**
     * [
     *     "0,0" => Light#0 (contains x and y coords),
     *     "0,1" => Light#1,
     *     "0,2" => Light#2,
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
        $i = GridIteratorString::get($x, $y);
        $light = $this->map[$i];
        if (
            $light instanceof Light &&
            $light->getLocation() === [$x,$y]
        ) {
            return $light->on;
        }
        throw new \RuntimeException('Error: Light not found');
    }

    private function initializeGridMap()
    {
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
                $i = GridIteratorString::get($x, $y);
                $this->map[$i] = new Light($x, $y);
            }
        }
    }
}