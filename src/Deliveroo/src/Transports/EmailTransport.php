<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Transports;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Phished\Deliveroo\Models\Order;
use Illuminate\Queue\SerializesModels;

final class EmailTransport extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        private Order $order,
        private String $message
    ) {
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject("Deliveroo order #{$this->order->id} message")
            ->with([
                'body' => $this->message,
            ])
            ->markdown('Deliveroo::mails.template');
    }
}
