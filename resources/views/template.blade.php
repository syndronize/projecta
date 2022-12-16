
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{'/'}}deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{'/'}}deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{'/'}}deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{'/'}}deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="{{'/'}}deskapp/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{'/'}}deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{'/'}}deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{'/'}}deskapp/vendors/styles/style.css">

	@yield('style')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{'/'}}deskapp/vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				
			</div>
		</div>
		<div class="header-right">
			<!-- <div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div> -->
			<!-- <div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/photo1.jpg" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/photo2.jpg" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/photo3.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/photo4.jpg" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{'/'}}deskapp/vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			<!-- logout -->
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="{{route('logout')}}" data-toggle="right-sidebar">
						<i class="dw dw-logout"></i>
					</a>
				</div>
			</div>
			
			
		</div>
	</div>

	

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="{{'/'}}deskapp/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="{{'/'}}deskapp/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					
					<li>
						<a href="{{route('dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-home"></span><span class="mtext">Home</span>
						</a>
					</li>
					@if(Session()->get('role') == 'admin')
					<li>
						<a href="{{route('member')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-12"></span><span class="mtext">Data Member</span>
						</a>
					</li>
					<li>
						<a href="{{route('barang')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-box"></span><span class="mtext">Data Barang</span>
						</a>
					</li>
					@endif
					<li>
						<a href="{{route('sewa')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-cart"></span><span class="mtext">Data Sewa</span>
						</a>
					</li>
					<!-- <li>
						<a href="{{route('penilaian')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-analytics-3"></span><span class="mtext">Data Penilaian</span>
						</a>
					</li> -->

					
					
				</ul>
			</div>
		</div>
	</div>

	<div class="main-container">
		<div class="pd-ltr-20">
			@yield('content')
		</div>
	</div>
	<!-- js -->
	<script src="{{'/'}}deskapp/vendors/scripts/core.js"></script>
	<script src="{{'/'}}deskapp/vendors/scripts/script.min.js"></script>
	<script src="{{'/'}}deskapp/vendors/scripts/process.js"></script>
	<script src="{{'/'}}deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="{{'/'}}deskapp/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{'/'}}deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{'/'}}deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{'/'}}deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{'/'}}deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="{{'/'}}deskapp/vendors/scripts/dashboard.js"></script>
	@yield('script')
</body>
</html>