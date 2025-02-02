<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>CampusSphere : A Website of e-Marketplace for UiTM Arau Campus</title>

		<!-- Site favicon -->
		<link
			rel="logo"
			sizes="180x180"
			href="vendors/images/logo.png"
		/>
		<link
			rel="square-logo"
			type="image/png"
			sizes="32x32"
			href="vendors/images/square-logo.png"
		/>
		<link
			rel="square-logo"
			type="image/png"
			sizes="16x16"
			href="vendors/images/square-logo.png"
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
	<body>
	 

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="vendors/images/photo1.jpg" alt="" />
							</span>
							<span class="user-name">
								{{ Auth::user()->name }}
							</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="{{ route('profile') }}">
							    <i class="dw dw-user1"></i> Profile</a>
							 
							<a class="dropdown-item" href="{{ route('logout') }}">
							    <i class="dw dw-logout"></i> Log Out</a>
						</div>
					</div>
				</div>
				<div class="github-link" style="display: flex; align-items: center; justify-content: center; height: 100%; padding-right: 20px;">
					<a href="{{ route('welcome') }}" style="display: flex; align-items: center; justify-content: center; height: 100%;">
					    <img src="vendors/images/home.png" alt="" style="height: 100%; width: auto; max-height: 50px;"/>
					</a>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.html">
					<img src="logo.png" alt="" class="dark-logo" />
					<img
						src="logo.png"
						alt=""
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
					    <li>
							<div class="sidebar-small-cap">User - for buying products</div>
						</li>
						<li>
							<a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>

						<li>
							<a href="{{ route('order',['order_type'=>'My Order']) }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-person-workspace"></span
								><span class="mtext">My Order</span>
							</a>
						</li>

						
						@if(Auth::user()->role_id==2)
						<li>
							<div class="dropdown-divider"></div>
						</li>
						
						<li>
							<div class="sidebar-small-cap">Admin</div>
						</li>
						<li>
							<a href="{{ route('category') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-list-ul"></span
								><span class="mtext">Manage Category</span>
							</a>
						</li>
						 
						<li>
							<a href="{{ route('user') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people"></span
								><span class="mtext">View User</span>
							</a>
						</li>
						 @endif

						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Seller - for selling products</div>
						</li>
						<li>
							<a href="{{ route('home.seller') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-speedometer2"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="{{ route('product') }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-shop-window"></span
								><span class="mtext">Manage Product</span>
							</a>
						</li>
						 
						<li>
							<a href="{{ route('order',['order_type'=>'Seller']) }}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-cart4"></span
								><span class="mtext">Manage Order</span>
							</a>
						</li>

						<li>
							<a href="{{ route('logout') }}" class="dropdown-toggle no-arrow mt-3">
								<span class="micon bi bi-box-arrow-left"></span
								>
								 <span class="mtext">Log Out</span>
							</a>
						</li>
						 


						 
					 
						 
						 
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">

            @yield('content')
			 
		</div>
		 
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		 
	</body>
</html>
