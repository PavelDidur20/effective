<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function testUserCanBeCreated()
    {
        $data = ['name'=>'Ivan ivanov','email'=>'ivan@mail.ru','password'=>'secret'];
        $user = new User($data);
        $this->assertSame('Ivan ivanov', $user->getFullName());
        $this->assertSame('ivan@mail.ru', $user->email);
    }

    public function testUserFullName()
    {
        $user = new User(['Petya', $user->getFullName());
    }
}
