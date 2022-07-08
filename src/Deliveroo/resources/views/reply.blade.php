<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveroo: Reply</title>

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
                        <h3>Reply to order #{{ $order->id }}</h3>
                    </div>

                    <div class="p-6">
                                                
                        @if ($errors->any())
                        <div class="alert alert-danger mb-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-700 rounded mb-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('order.sendReply', $order->id) }} " method="post">
                            <textarea name="message" class="border block p-2 w-full h-full rounded">{{ old('message') }}</textarea>

                            <div class="mt-6 text-right">
                                <input type="submit" class="cursor-pointer px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2" value="Send">
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
