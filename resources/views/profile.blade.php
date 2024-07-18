@extends('layouts.admin')
 

		 

		 
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			
			
			<div class="xs-pd-20-10 pd-ltr-20">
				 

				

				

				

				 
					 
					<!-- Simple Datatable start -->
					<div class="card-box mb-30">
						 
						
						<div class="pb-20 mb-30">

							<div class="container">
								<div class="title pb-20">
									<h2 class="h3 mb-0">Profile</h2>
				
									
								</div>

							<form action="{{ route('profile.update') }}" method="POST" class="">
							@csrf

								<div class="form-group">
									<label for="email">Name :</label>
									<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
								  </div>

								<div class="form-group">
								  <label for="email">Email address:</label>
								  <input type="email" class="form-control" value="{{Auth::user()->email}}" disabled>
								</div>
								 
								 
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							  </form>
							
								</div>
						</div>
					</div>
					<!-- Simple Datatable End -->
					 
					 
			 
 
				 

					 
				 

				 
			</div>



		</div>
		