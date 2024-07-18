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
					>Create Category</a>
				</div>

				<div class="title pb-20">
					<h2 class="h3 mb-0">Manage Category</h2>
				</div>

				<!-- Simple Datatable start -->
					
					<div class="card-box mb-30">
						 
						<div class="pb-20">
							
							<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus">Category</th>
										 
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($categories as $category)
									<tr>
										<td>{{$category->category ?? '' }}</td>
										 
										<td>
											<div class="table-actions">
												<a href="#" data-color="#265ed7"
												data-toggle="modal" data-target="#myModalEdit{{$category->id}}">
												<i class="icon-copy dw dw-edit2"></i
												></a>
												<a href="#" data-color="#e95959"
												data-toggle="modal" data-target="#myModalDel{{$category->id}}">
												<i class="icon-copy dw dw-delete-3"></i
												></a>


								<!-- The Modal -->
								<div class="modal" id="myModalDel{{$category->id}}">
								  <div class="modal-dialog">
									<div class="modal-content">
								
									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Are you sure to delete category ?</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>
								
									  <!-- Modal body -->
									  <div class="modal-body">
										 
										<p>{{$category->category ?? '' }}</p>
									  </div>
								
									  <!-- Modal footer -->
									  <div class="modal-footer">
										<a href="{{ route('category.delete',['category_id'=>$category->id]) }}" 
											class="btn btn-primary text-white">Confirm</a>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									  </div>
								
									</div>
								  </div>
								</div>

												
											</div>
										</td>
									</tr>




									<!-- The Modal -->
								<div class="modal" id="myModalEdit{{$category->id}}">
								  <div class="modal-dialog">
									<div class="modal-content">
										<form method="POST" action="{{ route('category.update') }}">
										@csrf
									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Update</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>
								
									  <!-- Modal body -->
									  <div class="modal-body">
										 
										
				
											 
											 
												<div class="form-group">
													<label>Category</label>
													<input class="form-control" 
													type="text" 
													name="category"
													value="{{$category->category}}"
													required>
												</div>
												 
										 
											 
											



									  </div>
								
									  <!-- Modal footer -->
									  <div class="modal-footer">
										<input class="form-control" 
													type="hidden" 
													name="id"
													value="{{$category->id}}">
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
							<form method="POST" action="{{ route('category.store') }}">
							@csrf

							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">
									Create Category
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
									<label>Category</label>
									<input class="form-control" 
									type="text" 
									name="category"
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
		