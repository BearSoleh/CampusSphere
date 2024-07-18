@extends('layouts.frontend')
 
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					 
					<div class="product-wrap">
						<div class="product-list">

							<ul class="row">

                                @forelse ($products as $product)
                
								<li class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <img src="{{ asset('uploads/'.$product->photo) }}" alt=""
                                                onmouseover="this.style.border = '3px solid #3D3940'; this.style.padding = '0px';"
                                                onmouseout="this.style.border = '3px solid #786F80'; this.style.padding = '3px';"
                                                style="border: 3px solid #786F80; padding: 3px; width: 400px; height: 300px; object-fit: contain; box-sizing: border-box;" />
                                        </div>
                                        <div class="product-caption">
                                            <h4><a href="#">{{ $product->name ?? '' }}</a></h4>
                                            <div class="price">RM {{ $product->price ?? '' }}</div>
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal{{ $product->id }}" type="button">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </li>

								<!-- The Modal -->
								<div class="modal" id="myModal{{$product->id}}">
								  <div class="modal-dialog">
									<div class="modal-content">
								
									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Are you sure to add to cart ?</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>
								
									  <!-- Modal body -->
									  <div class="modal-body">
										<p>{{$product->name ?? '' }}</p> 
										<p>RM {{$product->price ?? '' }}</p>
									  </div>
								
									  <!-- Modal footer -->
									  <div class="modal-footer">
										<a href="{{ route('addcart',['product_id'=>$product->id]) }}" class="btn btn-primary">Confirm Add</a>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									  </div>
								
									</div>
								  </div>
								</div>


					
                @empty 
				<div class="col-lg-12 pd-20 card-box height-100-p">
					<div class="alert alert-danger" role="alert">
						<h4 class="alert-heading h4">Product Not Found !</h4>
						<p>
							
						</p>
						<hr>
						<p class="mb-0">
							Please find another product.
						</p>
					</div>	
				</div>						          
                @endforelse

								 
							</ul>
						</div>
						 
					</div>
				</div>
				 
			</div>
		</div>
		