<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\AssocieController;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_calculoCPF()
    {
        $object = (new AssocieController());
        $response = $object->verifyCPF(61814601104);
        $this->assertFalse($response);
    }
}
