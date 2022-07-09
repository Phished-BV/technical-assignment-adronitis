<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Tests\Feature;

use Phished\Deliveroo\Models\User;
use Phished\Deliveroo\Models\Order;
use Illuminate\Support\Facades\Mail;
use Phished\Deliveroo\Tests\TestCase;
use Phished\Deliveroo\Services\OrderService;
use Phished\Deliveroo\Transports\EmailTransport;
use Phished\Deliveroo\Contracts\OrderServiceInterface;

class CanSendEmailTest extends TestCase
{
    private OrderServiceInterface $OrderService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->orderService = $this->app->make(OrderService::class);
    }

    /** @test */
    public function can_send_email()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create([
            'user_id' => $user->id
        ]);

        $this->orderService->reply($order, 'Fake message');
        
        Mail::assertSent(EmailTransport::class, function (EmailTransport $mail) use ($order) {
            return $mail->hasTo($order->user->email);
        });
    }
}
