<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use App\Services\UserService;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class MockTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testFindUserByEmailIsCalled()
    {
        $email = 'mock@example.com';
        $repo = Mockery::mock(UserRepositoryInterface::class);
        $repo->shouldReceive('findByEmail')->once()->with($email)
             ->andReturn(new User(['name'=>'Mock','email'=>$email]));

        $service = new UserService($repo);
        $user = $service->getByEmail($email);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($email, $user->email);
    }
}