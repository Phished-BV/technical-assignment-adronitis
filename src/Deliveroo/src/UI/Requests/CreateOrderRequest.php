<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'                 => ["required", "in:".config('order.allow_orders_from_email').""],
            'userId'                => 'required',
            'orderItems'            => 'required',
            'houseNumber'           => 'required',
            'street'                => 'required',
            'city'                  => 'required',
            'postalCode'            => 'required',
            'country'               => 'required',
            'phone'                 => 'required',
            'deliveryCost'          => 'required',
            'subTotal'              => 'required',
            'total'                 => 'required',
        ];
    }
}