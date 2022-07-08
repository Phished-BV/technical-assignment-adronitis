<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Delivering = 'delivering';
    case Delivered = 'Delivered';
    case Cancelled = 'cancelled';

    public function isPending(): bool
    {
        return $this === static::Pending;
    }

    public function isProcessing(): bool
    {
        return $this === static::Processing;
    }

    public function isDelivering(): bool
    {
        return $this === static::Delivering;
    }

    public function isDelivered(): bool
    {
        return $this === static::Delivered;
    }

    public function isCancelled(): bool
    {
        return $this === static::Cancelled;
    }
}
