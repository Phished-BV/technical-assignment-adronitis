<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveroo: Orders</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="https://1000logos.net/wp-content/uploads/2020/10/Deliveroo-logo.png" width="200">
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg w-full max-w-3xl">
                    <div class="px-6 py-2 font-bold border-b">
                        <h3>All orders</h3>
                    </div>

                    <div class="py-2 border-b grid grid-cols-11 gap-4 px-6">
                        <div class="col-span-3">
                            User
                        </div>
                        <div class="col-span-3">
                            Items
                        </div>
                        <div class="col-span-3">
                            Address
                        </div>
                        <div class="col-span-2">
                            Total
                        </div>
                    </div>
                    
                    @foreach($orders as $order)
                    <div class="border-b mb-4">
                        <div class="py-2 grid grid-cols-11 gap-4 px-6">
                            <div class="col-span-3">
                                {{ $order->getUserDetail() }}
                            </div>
                            <div class="col-span-3">
                                @foreach($order->orderItems as $item)
                                    {{ $item->getDetails() }}
                                @endforeach
                            </div>
                            <div class="col-span-3">
                                {!! $order->getAddress() !!}
                            </div>
                            <div class="col-span-2">
                                {{ $order->getTotal() }}
                            </div>
                        </div>

                        <div class="p-6 text-right">

                            @if (session()->has('success') && session()->get('success') == $order->id)
                                <div class="text-green-700 inline-block mr-2">Message sent</div>
                            @endif

                            <a href="orders/{{ $order->id }}/reply" class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Reply</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
