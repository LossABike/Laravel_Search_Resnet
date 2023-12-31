<?php

namespace App\Services\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public function __construct(OrderRepositoryInterface $orderRepository){
        $this->repository = $orderRepository;
    }
    public function getOrderByUserId($userId){
       return $this->repository->getOrderByUserId($userId);
    }
}
