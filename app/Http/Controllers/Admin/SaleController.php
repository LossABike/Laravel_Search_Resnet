<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductDetail\ProductDetailServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTimeZone;

class SaleController extends Controller
{
    private $productService;
    private $brandService;
    private $productCategoryService;
    private $productDetailService;

    public function __construct(ProductServiceInterface $productService , BrandServiceInterface $brandService , ProductCategoryServiceInterface $productCategoryService ,ProductDetailServiceInterface $productDetailService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->productCategoryService = $productCategoryService;
        $this->productDetailService = $productDetailService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->searchAndPaginate('name','');
        return view('admin.sale.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->find($id);
        $currentTime = Carbon::now(new DateTimeZone('Asia/Bangkok'));
        return view('admin.sale.edit', compact('currentTime','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $start_sale = $request->input('start_sale');
        $end_sale = $request->input('end_sale');
        $discount = $request->input('discount');
        $data = [
            'start_sale' => $start_sale ?? null,
            'end_sale' => $end_sale ?? null,
            'discount' => $discount ?? 0,
        ];
        $this->productService->update($data,$id);
        return redirect ("/admin/sale");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
