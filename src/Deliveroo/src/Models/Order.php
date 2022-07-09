<?php

declare(strict_types=1);

namespace Phished\Deliveroo\Models;

use Phished\Deliveroo\Models\User;
use Illuminate\Database\Eloquent\Model;
use Phished\Deliveroo\Enums\OrderStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Phished\Deliveroo\Database\Factories\OrderFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getUserDetail(): string
    {
        return $this->user->name.' ('.$this->user->email.')';
    }

    public function getAddress(): string
    {
        return $this->house_number.' '.$this->house_number_addition. 
        '<br>'. $this->street. 
        '<br>'. $this->city.
        '<br>'. $this->postal_code.
        '<br>'. $this->country.
        '<br>'. $this->phone;
    }

    public function getDeliveryCost(): ?float
    {
        return $this->delivery_cost;
    }

    public function getSubTotal(): ?float
    {
        return $this->sub_total;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    protected static function newFactory()
    {
        return OrderFactory::new();
    }
}
