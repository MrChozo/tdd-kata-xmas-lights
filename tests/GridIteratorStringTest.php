<?php

namespace Tests;

use App\GridIteratorString;

class GridIteratorStringTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function itsOneFunctionIsAccessibleStatically()
    {
        $x = 5;
        $y = 23;
        $this->assertEquals("$x,$y", GridIteratorString::get($x, $y));
    }
}
