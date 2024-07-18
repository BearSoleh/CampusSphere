@extends('layouts.admin')
 

		 

		 
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="pull-right">
					<a href="#"
					class="btn btn-primary btn-sm"
					data-toggle="modal"
					data-target="#bd-example-modal-lg"
					type="button" 
					>Create</a>

					
					



				</div>

				

				<div class="title pb-20">
					<h2 class="h3 mb-0">Manage Product</h2>

					
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
										<th class="table-plus">Photo</th>
										<th class="table-plus">Product</th>
										<th class="table-plus">Price</th> 
										<th class="table-plus">Category</th> 
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($products as $product)
									<tr>
										<td>
											<img src="{{ asset('uploads/'.$product->photo) }}" width="70" height="70" alt="">
										</td>
										<td>{{$product->name ?? '' }}</td>
										<td>{{$product->price ?? '' }}</td>
										<td>{{$product->categories->category ?? '' }}</td>										 
										<td>
											<div class="table-actions">
												<a href="#" data-color="#265ed7"
												data-toggle="modal" data-target="#myModalEdit{{$product->id}}">
												<i class="icon-copy dw dw-edit2"></i
												></a>


												


												<a href="#" data-color="#e95959"
												data-toggle="modal" data-target="#myModalDel{{$product->id}}">
												<i class="icon-copy dw dw-delete-3"></i
												></a>

												<!-- The Modal -->
								<div class="modal" id="myModalDel{{$product->id}}">
								  <div class="modal-dialog">
									<div class="modal-content">
								
									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Are you sure to delete the product?</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>
								
									  <!-- Modal body -->
									  <div class="modal-body">
										 
										<p>{{$product->name ?? '' }}</p>
									  </div>
								
									  <!-- Modal footer -->
									  <div class="modal-footer">
										<a href="{{ route('product.delete',['product_id'=>$product->id]) }}" 
											class="btn btn-primary text-white">Delete Product</a>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									  </div>
								
									</div>
								  </div>
								</div>




											</div>
										</td>
									</tr>


									<!-- The Modal -->
								<div class="modal" id="myModalEdit{{$product->id}}">
								  <div class="modal-dialog">
									<div class="modal-content">
									<form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
									@csrf
								
									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Update</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>
								
									  <!-- Modal body -->
									  <div class="modal-body">
										 
										<div class="form-group">
											<label>Product Name</label>
											<input class="form-control" 
											type="text" 
											name="name"
											value="{{$product->name}}"
											required>
										</div>
		
										<div class="form-group">
											<label>How to contact</label>
											<input class="form-control" 
											type="text" 
											name="description"
											value="{{$product->description}}"
											required>
										</div>
		
										<div class="form-group">
											<label>Price of the product</label>
											<input class="form-control" 
											type="number" 
											name="price"
											value="{{$product->price}}"
											required>
										</div>
		
										<div class="form-group">
											<label>Category</label>
											<select class="form-control" required name="category_id">
												<option>-Select-</option>
												@forelse ($categories as $category)
												<option value="{{$category->id}}" 
													{{ $category->id === $product->category_id ? 'selected' : '' }}>
													{{$category->category ?? '' }}</option>
												@empty 
																  
												@endforelse
		
											</select>
										</div>
		
										<div class="form-group">
											<label>Picture</label>
											<input class="form-control" 
											type="file" 
											name="photo"
											 >
										</div>
										<img src="{{ asset('uploads/'.$product->photo) }}" width="100%" height="300" alt="">


									  </div>
								
									  <!-- Modal footer -->
									  <div class="modal-footer">
										<input class="form-control" 
													type="hidden" 
													name="id"
													value="{{$product->id}}">
										<button type="submit" 
											class="btn btn-primary text-white">Update</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									  </div>
									</form>
								
									</div>
								  </div>
								</div>



									@empty 
												          
									@endforelse
									 
								</tbody>
							</table>
						</div>
					</div>
					<!-- Simple Datatable End -->
					 
					 
			 
 
				 

					<div
					class="modal fade bs-example-modal-lg"
					id="bd-example-modal-lg"
					tabindex="-1"
					role="dialog"
					aria-labelledby="myLargeModalLabel"
					aria-hidden="true"
					>
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content">
							<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
							@csrf

							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">
									Create 
								</h4>
								<button
									type="button"
									class="close"
									data-dismiss="modal"
									aria-hidden="true"
								>
									×
								</button>
							</div>
							<div class="modal-body">
								
								

								<div class="form-group">
									<label>Name of product</label>
									<input class="form-control" 
									type="text" 
									name="name" 
									required>
								</div>

								<div class="form-group">
									<label>How to contact</label>
									<input class="form-control" 
									type="text" 
									name="description" 
									required>
								</div>

								<div class="form-group">
									<label>Price of product</label>
									<input class="form-control" 
									type="number" 
									name="price"									
									required>
								</div>

								<div class="form-group">
									<label>Category</label>
									<select class="form-control" required name="category_id">
										<option>-Select-</option>
										@forelse ($categories as $category)
										<option value="{{$category->id}}">{{$category->category ?? '' }}</option>
										@empty 
												          
										@endforelse

									</select>
								</div>

								<div class="form-group">
									<label>Picture</label>
									<input class="form-control" 
									type="file" 
									name="photo"
									required>
								</div>
								 
							</div>
							<div class="modal-footer">
								<button
									type="button"
									class="btn btn-secondary"
									data-dismiss="modal"
								>
									Close
								</button>
								<button type="submit" class="btn btn-primary">
									Save changes
								</button>
							</div>
							</form>
						</div>
					</div>

				 

				 
			</div>
		</div>
		