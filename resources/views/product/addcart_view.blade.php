@extends('layouts.frontend')

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <form method="POST" action="{{ route('addcart.update') }}">
        @csrf
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="pull-right">
                <button class="btn btn-primary btn-sm" type="submit">Save</button> 

                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalConfirm">Check Out</a> 

                <!-- The Modal -->
                <div class="modal" id="myModalConfirm">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Are you sure to Checkout order ?</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <a href="{{route('addcart.checkout')}}" class="btn btn-primary">Confirm Checkout</a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="title pb-20">
                <h2 class="h3 mb-0">Cart</h2>
            </div>

            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pb-20">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus">Product</th>
                                <th class="table-plus" width="20%">Qty</th>
                                <th class="table-plus" width="20%">Price</th>
                                <th class="table-plus">Total Price</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_products  as $key => $order_product)
                                <tr>
                                    <td>{{$order_product->product->name ?? '' }}</td>
                                    <td>
                                        <div class="form-group"> 
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <input id="demo3_22" type="text" value="{{$order_product->quantity ?? '' }}" name="qty[]" class="form-control">
                                                <input id="demo3_22" type="hidden" value="{{$order_product->id ?? '' }}" name="id[]" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$order_product->product->price ?? '' }}</td>                                         
                                    <td>{{$order_product->product->price*$order_product->quantity ?? '' }}</td>                                         
                                    <td>
                                        <div class="table-actions">
                                            <a data-color="#265ed7" data-toggle="modal" data-target="#myModal{{$order_product->id}}" type="button">
                                                <i class="icon-copy dw dw-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- The Modal -->
                                <div class="modal" id="myModal{{$order_product->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure to delete from cart ?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p>{{$order_product->product->name ?? '' }}</p> 
                                                <p>RM {{$order_product->product->price ?? '' }}</p>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <a href="{{ route('addcart.delete',['product_id'=>$order_product->id]) }}" class="btn btn-primary">Confirm Delete</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty 
                                <tr>
                                    <td colspan="5" class="text-center">No products in the cart</td>
                                </tr>                 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </form>
</div>
