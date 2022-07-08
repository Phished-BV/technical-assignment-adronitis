<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Phished\Deliveroo\Contracts\OrderRepositoryInterface;

class GetOrdersHttpController extends Controller
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    ) {
    }

    public function __invoke() {

       return view('deliveroo::orders', [
            'orders' => $this->orderRepository->allOrders()
       ]);
    }
}
