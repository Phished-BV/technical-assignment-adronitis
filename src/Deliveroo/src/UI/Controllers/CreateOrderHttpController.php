<?php

declare(strict_types=1);

namespace Phished\Deliveroo\UI\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Phished\Deliveroo\Contracts\OrderRepositoryInterface;
use Phished\Deliveroo\DTO\CreateOrderDTO;
use Phished\Deliveroo\Models\Order;
use Phished\Deliveroo\UI\Requests\CreateOrderRequest;

class CreateOrderHttpController extends Controller
{
    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    ) {
    }

    public function __invoke(
        CreateOrderRequest $request
    ): JsonResponse {
        $createdOrder = $this->orderRepository->createOrder(CreateOrderDTO::fromRequest($request));

        return response()->json($createdOrder, Response::HTTP_CREATED);
    }
}
