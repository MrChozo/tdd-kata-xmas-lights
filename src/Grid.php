<?php

namespace App;

class Grid
{
    /**
     * Grid size
     */
    public int $xMin;
    public int $xMax;
    public int $yMin;
    public int $yMax;

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
        $this->xMin = $_ENV['GRID_XMIN'];
        $this->xMax = $_ENV['GRID_XMAX'];
        $this->yMin = $_ENV['GRID_YMIN'];
        $this->yMax = $_ENV['GRID_YMAX'];
        $this->initializeGridMap();
    }

    public function __clone()
    {
        foreach ($this->map as $key => $a) {
            $this->map[$key] = clone $this->map[$key];
        }
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
        echo "Initializing Grid->map.\n";
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
        if ((bool)$_ENV['DEBUG']) {
            $this->displayGridMap();
        }
    }

    public function displayGridMap(): void
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
                $light = $this->map[$i];
                echo "($i)->" . (int)$light->on . " ";
            }
            echo "\n";
        }
        echo "\n";
    }

    public function toggleLightsOnOff(Selection $selection)
    {
        echo "Toggling lights on/off.\n";
        for (
            $x = $selection->startXCoord;
            $x >= $selection->startXCoord && $x <= $selection->endXCoord;
            $x++
        ) {
            for (
                $y = $selection->startYCoord;
                $y >= $selection->startYCoord && $y <= $selection->endYCoord;
                $y++
            ) {
                $i = GridIteratorString::get($x, $y);
                $light = $this->map[$i];
                $light->toggleOnOff();
            }
        }
        if ((bool)$_ENV['DEBUG']) {
            $this->displayGridMap();
        }
    }
}