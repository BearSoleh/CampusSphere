@extends('layouts.admin')
 

		 

		 
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				 

				

				<div class="title pb-20">
					<h2 class="h3 mb-0">My Orders - Order Lists</h2>

					
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
										 
										<th class="table-plus">Order No.</th>
										<th class="table-plus">Date</th>
										<th class="table-plus">Customer</th> 
										 
										<th class="table-plus">Status</th> 
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($orders as $order)
									<tr>
										 
										<td>{{$order->order_number ?? '' }}</td>
										<td>{{$order->created_at ?? '' }}</td>
										<td>{{$order->customer->name ?? '' }}</td>
										 
										<td>
											@if($order->order_status_id==1)
												<span class="badge badge-primary">{{$order->order_status->status ?? '' }}</span>
												@elseif($order->order_status_id==2)
												<span class="badge badge-danger">{{$order->order_status->status ?? '' }}</span>
												@else
												<span class="badge badge-success">{{$order->order_status->status ?? '' }}</span>
												@endif
										</td>										 
										<td>
											<div class="table-actions">
												<a href="{{route('order.view',['id'=>$order->id])}}" data-color="#265ed7"
													><i class="icon-copy dw dw-eye"></i
												></a>
												 
											</div>
										</td>
									</tr>
									@empty 
												          
									@endforelse
									 
								</tbody>
							</table>
						</div>
					</div>
					<!-- Simple Datatable End -->
					 
					 
			 
 
				 

					 

				 

				 
			</div>
		</div>
		