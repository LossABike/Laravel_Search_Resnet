<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends  BaseService implements ProductServiceInterface
{

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->repository = $productRepository;
    }
    //find and caculate AVG_rating
    public function find(int $id)
    {
        $product = $this->repository->find($id);
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(),'rating'));
        $countRating = count($product->productComments);
        if($countRating!=0){
             $avgRating = $sumRating/$countRating;
        }
        $product->avgRating = $avgRating;
        return $product;
    }
    public function getRalatedProducts($product,$limit=4){
        return $this->repository->getRalatedProducts($product,$limit);
    }
    public function getFeaturedProducts(){
        return [
            "men"   => $this->repository->getFeaturedProductsByCategory(1),
            "women" =>$this->repository->getFeaturedProductsByCategory(2),
        ];


    }
    public function getProductOnIndex($request){
        return $this->repository->getProductOnIndex($request);

    }
    public function getProductsByCategory($categoryName,$request){
        return $this->repository->getProductsByCategory($categoryName,$request);
    }
    
    public function getProductOnList($list_id){
        return $this->repository->getProductOnList($list_id);
    }
    public function getSaleProduct(){
        return $this->repository->getSaleProduct();
    }
    public function getBestSaleProduct(){
        return $this->repository->getBestSaleProduct();
    }

}
