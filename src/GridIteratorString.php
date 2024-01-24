<?php

namespace App;

class GridIteratorString
{
    public static function get(int $x, int $y): string
    {
        return "$x,$y";
    }
}