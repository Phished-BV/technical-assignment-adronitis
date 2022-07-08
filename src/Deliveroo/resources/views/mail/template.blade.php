@component('mail::message')
Hi {{ $order->user->name }},

{!! $body !!}

Thanks,
Deliveroo
@endcomponent
