<?php

namespace App;

class Light
{
    public bool $on = false;
    public int $xLocation = 0;
    public int $yLocation = 0;

    public function __construct()
    {
    }

    public function getLocation()
    {
        return '(' . $this->xLocation . ', ' . $this->yLocation . ')';
    }

    public function turnOn()
    {
        $this->on = true;
    }

    public function turnOff()
    {
        $this->on = false;
    }

    public function setXLocation(int $x)
    {
        $this->xLocation = $x;
    }

    public function setYLocation(int $y)
    {
        $this->yLocation = $y;
    }
}