<?php

namespace App;

class Light
{
    public bool $on = false;
    public int $xLocation = 0;
    public int $yLocation = 0;

    /**
     * @param int $xLocation
     * @param int $yLocation
     */
    public function __construct(int $xLocation = null, int $yLocation = null)
    {
        $this->setXLocation($xLocation);
        $this->setYLocation($yLocation);
    }

    public function getLocation()
    {
        return [$this->xLocation, $this->yLocation];
    }

    public function displayLocationString()
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

    public function setXLocation(int $x = null)
    {
        $this->xLocation = $x ?? 0;
    }

    public function setYLocation(int $y = null)
    {
        $this->yLocation = $y ?? 0;
    }

    public function toggleOnOff()
    {
        if ($this->on) {
            $this->turnOff();
        } else {
            $this->turnOn();
        }
    }
}