@extends('layouts.admin')

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">My Orders - Order Details</h2>
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

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <h5 class="mb-20 h5 text-blue">Order Detail</h5>
                            <div class="profile-info">
                                <ul>
                                    <li><span>Order No :</span> {{$order->order_number}}</li>
                                    <li><span>Date :</span> {{$order->created_at}}</li>
                                    <li><span>Customer :</span> {{$order->customer->name ?? '' }}</li>
                                </ul>
                            </div>
                            <div class="profile-social">
                                <h5 class="mb-20 h5 text-blue">Status :
                                    @if($order->order_status_id == 1)
                                        <span class="badge badge-primary">{{$order->order_status->status ?? '' }}</span>
                                    @elseif($order->order_status_id == 2)
                                        <span class="badge badge-danger">{{$order->order_status->status ?? '' }}</span>
                                    @else
                                        <span class="badge badge-success">{{$order->order_status->status ?? '' }}</span>
                                    @endif
                                </h5>
                                @if($order->order_status_id == 3)
                                    <a href="{{ route('invoice',['id'=>$order->id]) }}" target="_blank" class="btn btn-dark btn-lg">Invoice</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Product Order</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Payment</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Timeline Tab start -->
                                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                            <div class="pd-20">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $total = 0; ?>
                                                        @forelse ($order_products as $key => $order_product)
                                                            <tr>
                                                                <td>{{$order_product->product->name ?? '' }}</td>
                                                                <td>{{$order_product->quantity ?? '' }}</td>
                                                                <td>{{$order_product->product->price ?? '' }}</td>
                                                                <td>{{$order_product->product->price * $order_product->quantity ?? '' }}</td>
                                                            </tr>
                                                            <?php $total += $order_product->product->price * $order_product->quantity; ?>
                                                        @empty
                                                        @endforelse
                                                        <tr>
                                                            <td colspan="3" class="text-right">Total</td>
                                                            <td>{{$total}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Timeline Tab End -->
                                        <!-- Tasks Tab start -->
                                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                                            <div class="pd-20 profile-task-wrap">
                                                @if(Auth::user()->id == $order_product->order->user_id)
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Upload Receipt</button>

                                                    <!-- The Modal -->
                                                    <div class="modal" id="myModal">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="POST" action="{{ route('payment.store') }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Upload Receipt</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Amount</label>
                                                                            <input class="form-control" type="number" name="amount" value="{{$total}}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Upload File</label>
                                                                            <input class="form-control" type="file" name="file">
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <input class="form-control" type="hidden" name="order_id" value="{{$order_product->order_id}}">
                                                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="profile-timeline">
                                                    <div class="timeline-month">
                                                        <h5>Payment List</h5>
                                                    </div>
                                                    <div class="profile-timeline-list">
                                                        <ul>
                                                            @forelse ($order_payments as $order_payment)
                                                                <li>
                                                                    <div class="date">{{$order_payment->created_at->format('d M')}}</div>
                                                                    <div class="task-name">
                                                                        <a href="#" data-toggle="modal" data-target="#myModalSlip{{$order_payment->id}}">
                                                                            <i class="ion-ios-clock"></i> Click View Payment Receipt
                                                                        </a>
                                                                    </div>
                                                                    <!-- The Modal -->
                                                                    <div class="modal" id="myModalSlip{{$order_payment->id}}">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <!-- Modal Header -->
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Payment Receipt</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                </div>
                                                                                <!-- Modal body -->
                                                                                <div class="modal-body">
                                                                                    <img src="{{ asset('payments/'.$order_payment->file) }}" width="100%" height="300" alt="">
                                                                                </div>
                                                                                <!-- Modal footer -->
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="task-time">{{$order_payment->created_at->format('h:i:s')}}</div>
                                                                    <p>
                                                                        @if(Auth::user()->id == $order_product->order->seller_id)
                                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalAccept{{$order_payment->id}}">Accept</button>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalReject{{$order_payment->id}}">Reject</button>
                                                                        @endif
                                                                    </p>
                                                                </li>
                                                                <!-- The Modal for Accept -->
                                                                <div class="modal" id="myModalAccept{{$order_payment->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Are you sure to Accept?</h4>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <a href="{{ route('payment.update',['payment_status_id'=>2,'order_id'=>$order_payment->order_id]) }}" class="btn btn-primary text-white">Confirm Accept</a>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- The Modal for Reject -->
                                                                <div class="modal" id="myModalReject{{$order_payment->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Are you sure to Reject?</h4>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <a href="{{ route('payment.update',['payment_status_id'=>3,'order_id'=>$order_payment->order_id]) }}" class="btn btn-primary text-white">Confirm Reject</a>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tasks Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>
</div>
