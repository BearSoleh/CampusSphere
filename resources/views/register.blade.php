<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>CampusSphere</title>

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

		 
		 
		 
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="{{ url('/') }}">
						<img src="logo.png" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li>
							<a href="{{ route('login') }}">
								Login</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="vendors/images/title.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">
									Register
								</h2>
							</div>
							<form method="POST" action="{{ route('register.store') }}">
							@csrf

							<div class="input-group custom">
								<input
									type="text"
									name="name"
									class="form-control form-control-lg @error('name') is-invalid @enderror"
									placeholder="Name"
									value="{{ old('name') }}" 
									required 
									autocomplete="off" 
									autofocus
								/>
								<div class="input-group-append custom">
									<span class="input-group-text"
										><i class="icon-copy dw dw-user1"></i
									></span>
								</div>
							</div>

								 
								<div class="input-group custom">
									<input
										type="text"
										name="email"
										class="form-control form-control-lg @error('email') is-invalid @enderror"
										placeholder="Email"
										value="{{ old('email') }}" 
										required 
										autocomplete="off" 
										autofocus
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Password"
										class="form-control @error('password') is-invalid @enderror" 
										name="password" 
										required 
										autocomplete="off"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								 
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											 
											<input class="btn btn-primary btn-lg btn-block" type="submit" 
											value="Register">
										 
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="{{ route('login') }}"
												>Login</a
											>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		 
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		 
	</body>
</html>
