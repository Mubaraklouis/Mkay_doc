<?php

namespace Tests\Unit;

use App\services\Mathhelper;
use PHPUnit\Framework\TestCase;

class testMathFunction extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {

        //create all the expected variables
        $num1=4;
        $num2 =5;
        $sum = $num1+$num2;

        //try to call the function you wanna test
        $results = Mathhelper::add($num1,$num2);
        //assert the result of the function
        $this->assertSame($sum,$results);
    }
}
