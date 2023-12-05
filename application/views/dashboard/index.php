<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
	<meta name="description" content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
	<meta name="robots" content="noindex,nofollow">
	<title>Monster Lite Template by WrapPixel</title>
	<link rel="canonical" href="<?= base_url(); ?>assets/https://www.wrappixel.com/templates/monster-admin-lite/" />
	<!-- Favicon icon -->
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png"> -->
	<!-- Custom CSS -->
	<link href="<?= base_url(); ?>assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<!-- <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet"> -->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<div id="wrapper" class="d-flex" style="height: 100%;">

		<div class="page-wrapper flex-grow-1">
			<div class="page-breadcrumb ml-4">
				<div class="row align-items-center">
					<div class="col-md-6 col-8 align-self-center">
						<h3 class="mr-4">Welcome To the D'besto</h3>
						<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb ms-3">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>


			<div class="container-fluid">
				<div class="row">
					<!-- Column -->
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Daily In / Out</h4>
								<div class="text-end">
									<h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> $120</h2>
									<span class="text-muted">Todays Income</span>
								</div>
								<span class="text-success">80%</span>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Column -->
					<!-- Column -->
					<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Weekly Report</h4>
								<div class="text-end">
									<h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> $5,000</h2>
									<span class="text-muted">Todays Income</span>
								</div>
								<span class="text-info">30%</span>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Column -->
				</div>
				<!-- ============================================================== -->
				<!-- Sales chart -->
				<!-- ============================================================== -->
				<div class="row">
					<!-- column -->
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Revenue Statistics</h4>
								<div class="flot-chart">
									<div class="flot-chart-content " id="flot-line-chart" style="padding: 0px; position: relative;">
										<canvas class="flot-base w-100" height="400"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- column -->
				</div>
				<!-- ============================================================== -->
				<!-- Table -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="d-md-flex">
									<h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Projects of the Month</h4>
									<div class="col-md-2 ms-auto">
										<select class="form-select shadow-none col-md-2 ml-auto">
											<option selected>January</option>
											<option value="1">February</option>
											<option value="2">March</option>
											<option value="3">April</option>
										</select>
									</div>
								</div>
								<div class="table-responsive mt-5">
									<table class="table stylish-table no-wrap">
										<thead>
											<tr>
												<th class="border-top-0" colspan="2">Assigned</th>
												<th class="border-top-0">Name</th>
												<th class="border-top-0">Budget</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="width:50px;"><span class="round">S</span></td>
												<td class="align-middle">
													<h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
												</td>
												<td class="align-middle">Elite Admin</td>
												<td class="align-middle">$3.9K</td>
											</tr>
											<tr class="active">
												<td><span class="round"><img src="<?= base_url(); ?>assets/images/users/2.jpg" alt="user" width="50"></span></td>
												<td class="align-middle">
													<h6>Andrew</h6><small class="text-muted">Project Manager</small>
												</td>
												<td class="align-middle">Real Homes</td>
												<td class="align-middle">$23.9K</td>
											</tr>
											<tr>
												<td><span class="round round-success">B</span></td>
												<td class="align-middle">
													<h6>Bhavesh patel</h6><small class="text-muted">Developer</small>
												</td>
												<td class="align-middle">MedicalPro Theme</td>
												<td class="align-middle">$12.9K</td>
											</tr>
											<tr>
												<td><span class="round round-primary">N</span></td>
												<td class="align-middle">
													<h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small>
												</td>
												<td class="align-middle">Elite Admin</td>
												<td class="align-middle">$10.9K</td>
											</tr>
											<tr>
												<td><span class="round round-warning">M</span></td>
												<td class="align-middle">
													<h6>Micheal Doe</h6><small class="text-muted">Content Writer</small>
												</td>
												<td class="align-middle">Helping Hands</td>
												<td class="align-middle">$12.9K</td>
											</tr>
											<tr>
												<td><span class="round round-danger">N</span></td>
												<td class="align-middle">
													<h6>Johnathan</h6><small class="text-muted">Graphic</small>
												</td>
												<td class="align-middle">Digital Agency</td>
												<td class="align-middle">$2.6K</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<!-- Column -->
					<div class="col-lg-4 col-md-6">
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url(); ?>assets/images/big/bur.jpg" alt="Card">
							<div class="card-body">
								<ul class="list-inline d-flex align-items-center">
									<li class="ps-0">20 May 2023</li>
									<li class="ms-auto"><a href="javascript:void(0)" class="link">3 Comment</a></li>
								</ul>
								<h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
							</div>
						</div>
					</div>
					<!-- Column -->
					<!-- Column -->
					<div class="col-lg-4 col-md-6">
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url(); ?>assets/images/big/kentang.jpg" alt="Card">
							<div class="card-body">
								<ul class="list-inline d-flex align-items-center">
									<li class="ps-0">20 May 2023</li>
									<li class="ms-auto"><a href="javascript:void(0)" class="link">3 Comment</a></li>
								</ul>
								<h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
							</div>
						</div>
					</div>
					<!-- Column -->
					<!-- Column -->
					<div class="col-lg-4 col-md-6">
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url(); ?>assets/images/big/ayam.jpg" alt="Card">
							<div class="card-body">
								<ul class="list-inline d-flex align-items-center">
									<li class="ps-0">20 May 2023</li>
									<li class="ms-auto"><a href="javascript:void(0)" class="link">3 Comment</a></li>
								</ul>
								<h3 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h3>
							</div>
						</div>
					</div>
					<!-- Column -->
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url(); ?>assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/app-style-switcher.js"></script>
	<!--Wave Effects -->
	<script src="<?= base_url(); ?>assets/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="<?= base_url(); ?>assets/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="<?= base_url(); ?>assets/js/custom.js"></script>
	<!--This page JavaScript -->
	<!--flot chart-->
	<script src="<?= base_url(); ?>assets/plugins/flot/jquery.flot.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
