<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Phished\Deliveroo\UI\Requests\ReplyOrderRequest;
use Phished\Deliveroo\Contracts\OrderServiceInterface;

class SendReplyOrderHttpController extends Controller
{
    public function __construct(
        private readonly OrderServiceInterface $orderService,
    ) {
    }

    public function __invoke(
        ReplyOrderRequest $request,
        int $orderId
    ) {
        $this->orderService->reply($orderId, $request->get('message'));

        return redirect(route('order.show'))->with('success', $orderId);
    }
}
