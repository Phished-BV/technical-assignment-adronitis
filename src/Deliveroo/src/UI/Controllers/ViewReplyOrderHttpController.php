<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Controllers;

use App\Http\Controllers\Controller;
use Phished\Deliveroo\Contracts\OrderRepositoryInterface;

class ViewReplyOrderHttpController extends Controller
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    ) {
    }

    public function __invoke(int $orderId) {

       return view('deliveroo::reply', [
            'order' => $this->orderRepository->detail($orderId)
       ]);
    }
}
