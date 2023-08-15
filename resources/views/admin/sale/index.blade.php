@extends('admin.layout.master')

@section('title','Manage Sale')
@section('body')
                <!-- Main -->
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Sale Product
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                             
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">

                                <div class="card-header">

                                    <form>
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" value="{{ request('search') }}"
                                                placeholder="Search everything" class="form-control">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Search
                                                </button>
                                            </span>
                                        </div>
                                    </form>

                                   
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th>Product Name</th>
                                                <th >Start Sale</th>
                                                <th >End Sale</th>
                                                <th >Default Price</th>
                                                <th >Sale Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($products as $product)
                                                    <tr>
                                                        <td class="text-center text-muted">#{{$product->id}}</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">{{$product->name}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">{{$product->start_sale ? Carbon\Carbon::parse($product->start_sale)->format('h:i:s -- d/m/Y') : ''}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">{{$product->end_sale ? Carbon\Carbon::parse($product->end_sale)->format('h:i:s -- d/m/Y') : ''}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">${{$product->price}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">${{$product->discount}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="./admin/sale/{{$product->id}}/edit" data-toggle="tooltip" title="Set Timer Sale"
                                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                                <span class="btn-icon-wrapper opacity-8">
                                                                    <i class="fa fa-edit fa-w-20"></i>
                                                                </span>
                                                            </a>
                                        
                                                        </td>
                                                        
                                            
                                                    </tr>

                                            @endforeach()

                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block card-footer">
                                    {{$products->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection
