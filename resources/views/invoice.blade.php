<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>CampusSphere - Invoice</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
<style>
	@media print{
		.noprint{
			display:none;
		}
	 }
</style>
		 
	 
	</head>
	<body onload="window.print(); window.close(); ">
		 

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					
					<div class="invoice-wrap">
						<div class="invoice-box">
							<div class="noprint">
							<button class="btn btn-dark btn-lg " onclick="window.print()">Print this page</button>
							</div>

							<div class="invoice-header">
								<div class="logo text-center">
									<img src="vendors/images/deskapp-logo.png" alt="" />
								</div>
							</div>
							<h4 class="text-center mb-30 weight-600">INVOICE</h4>
							<div class="row pb-30">
								<div class="col-md-6">
									<h5 class="mb-15">{{$order->customer->name ?? '' }}</h5>
									<p class="font-14 mb-5">
										Date Issued: <strong class="weight-600">
                                            {{$order->created_at->format('d M Y') ?? '' }}
                                        </strong>
									</p>
									<p class="font-14 mb-5">
										Invoice No: <strong class="weight-600">
                                            {{$order->order_number ?? '' }}
                                        </strong>
									</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										<p class="font-14 mb-5"> </p>
										<p class="font-14 mb-5"> </p>
										<p class="font-14 mb-5"></p>
										<p class="font-14 mb-5"></p>
									</div>
								</div>
							</div>
							<div class="invoice-desc pb-30">
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">Product</div>
									<div class="invoice-rate">Qty</div>
									<div class="invoice-hours">Price</div>
									<div class="invoice-subtotal">Subtotal</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<?php
										$total =0;
										?>
										@forelse ($order_products  as $key => $order_product)
										<li class="clearfix">
											<div class="invoice-sub">
												{{$order_product->product->name ?? '' }}
											</div>
											<div class="invoice-rate">
												{{$order_product->quantity ?? '' }}
											</div>
											<div class="invoice-hours">
												{{$order_product->product->price ?? '' }}
											</div>
											<div class="invoice-subtotal">
												<span class="weight-600">
													{{$order_product->product->price*$order_product->quantity ?? '0.00' }}
												</span>
											</div>
										</li>
										<?php
										$sum =$order_product->product->price*$order_product->quantity;
										$total =$total+$sum;
										?>
										@empty 
												          
										@endforelse
									</ul>
								</div>
								<div class="invoice-desc-footer">
									<div class="invoice-desc-head clearfix">
										<div class="invoice-sub"> </div>
										<div class="invoice-rate"> </div>
										<div class="invoice-subtotal">Total</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="invoice-sub">
													<p class="font-14 mb-5">
														 &nbsp;
														<strong class="weight-600">&nbsp;</strong>
													</p>
													<p class="font-14 mb-5">
														&nbsp; <strong class="weight-600">&nbsp;</strong>
													</p>
												</div>
												<div class="invoice-rate font-20 weight-600">
													&nbsp;
												</div>
												<div class="invoice-subtotal">
													<span class="weight-800 font-24 text-danger"
														>{{number_format($total,2)}}</span
													>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<h4 class="text-center pb-20">Thank You!!</h4>
                           
						</div>
					</div>
				</div>
				 
			</div>
		</div>
		 
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
        <br><br><br>
	</body>
</html>
