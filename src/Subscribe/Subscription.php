<?php

namespace App\Subscribe;

class Subscription
{
    public function __construct(protected Gateway $gateway, protected Mailer $mailer) {}

    public function create(User $user): void
    {
        $name = $this->gateway->create();

        $this->mailer->deliver('email delivered to : ' . $name);

        $user->subscribed = true;
    }
}