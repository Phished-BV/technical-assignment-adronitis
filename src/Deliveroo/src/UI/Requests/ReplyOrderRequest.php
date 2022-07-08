<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message'     => 'required',
        ];
    }
}