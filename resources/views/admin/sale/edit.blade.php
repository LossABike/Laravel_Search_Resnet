@extends('admin.layout.master')

@section('title','Manage Sale Product')
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
                                <div class="card-body">
                                    <form method="post" action="admin/sale/{{$product->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Product Name</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="name" placeholder="Name" disabled type="text"
                                                    class="form-control" value="{{$product->name}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Start Sale Time</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input  name="start_sale" id="start_sale" placeholder="Start Sale" type="datetime-local"
                                                    class="form-control" value="{{$product->start_sale ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">End Sale Time</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input  name="end_sale" id="end_sale" placeholder="End Sale"  type="datetime-local"
                                                    class="form-control" value="{{$product->end_sale ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Default Price</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="price" placeholder="Price" disabled type="number"
                                                    class="form-control" value="{{$product->price}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Price Sale</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="discount" id="discount" placeholder="Discount"  type="number"
                                                    class="form-control" value="{{$product->discount}}">
                                            </div>
                                        </div>



                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-5">
                                                <a href="/admin/sale" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Cancel</span>
                                                </a>
                                                <button class="btn-shadow btn-hover-shine btn btn-warning" id="clearTime">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Clear Timer</span>
                                                </button>
                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- End Main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    $("#end_sale").change(function() {
        let start_time = $('#start_sale').val();
        let end_time = $('#end_sale').val();
        
        if(start_time >= end_time){
            alert('Time Error . Start time bigger than end time !!');
            $("#start_sale").val("");
            $("#end_sale").val("");

        }
    });
  
    $("#discount").change(function() {
        let defaultPrice = $("#price").val();
        let discount = $("#discount").val();

        if(discount >= defaultPrice){
            alert("Price Error . Price discount must be smaller than default price!!");
            $("#discount").val("");
        }
    });
    $("#clearTime").click(function(event){
        event.preventDefault();
        $("#start_sale").val("");
        $("#end_sale").val("");
    });
 </script>

@endsection
