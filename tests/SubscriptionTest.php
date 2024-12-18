<?php

use App\Subscribe\Gateway;
use App\Subscribe\Mailer;
use App\Subscribe\Subscription;
use App\Subscribe\User;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    #[Test] public function it_can_subscribe_a_user()
    {
        $subscription = new Subscription(
            $this->createMock(Gateway::class),
            $this->createMock(Mailer::class) //Dummy because it just fills the space
        );
        $user = new User('John Doe');

        $this->assertFalse($user->subscribed);

        $subscription->create($user);

        $this->assertTrue($user->subscribed);
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    #[Test] public function it_can_deliver_an_email()
    {
        $gateway = $this->createMock(Gateway::class);
        $gateway->method('create')->willReturn('John Doe'); // Stub because we are expecting anything from him

        $mailer = $this->createMock(Mailer::class);
        $mailer
            ->expects($this->once())
            ->method('deliver')
            ->with('email delivered to : John Doe'); // This is a mock because it has expectations

        $subscription = new Subscription($gateway, $mailer);

        $subscription->create(new User('John Doe'));
    }
}
