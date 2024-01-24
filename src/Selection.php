<?php

namespace App;

class Selection
{
    public int $startXCoord = 0;
    public int $startYCoord = 0;
    public int $endXCoord = 0;
    public int $endYCoord = 0;

    /**
     * @param int $startXCoord
     * @param int $startYCoord
     * @param int $endXCoord
     * @param int $endYCoord
     */
    public function __construct(int $startXCoord, int $startYCoord, int $endXCoord, int $endYCoord)
    {
        $this->startXCoord = $startXCoord;
        $this->startYCoord = $startYCoord;
        $this->endXCoord = $endXCoord;
        $this->endYCoord = $endYCoord;
    }
}