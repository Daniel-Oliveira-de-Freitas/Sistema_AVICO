<?php

namespace Tests\Unit;

use App\Http\Controllers\Register\RegisterFormController;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_calculoCPF()
    {
        $object = (new RegisterFormController());
        $response = $object->verifyCPF(61814601104);
        $this->assertFalse($response);
    }
}
