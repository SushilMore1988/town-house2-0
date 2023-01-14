@extends('admin.layouts.app')

@section('content')
	<div class=" pt-3 pb-2 border-bottom">
		<h1>Dashboard</h1>
	</div>
	<div class="admin-dashboard py-5">
		<div class="row card-deck">
			<!-- <div class="col-md-3 "> -->
				<div class="sub-dashboard card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="admin-icon">
									<div class="d-table h-100 w-100">
										<div class="d-table-cell align-middle text-center">
											<i class="fas fa-user"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="admin-text">
									<h4>100 <small style="font-size: 16px" class="pl-2">Users</small></h4>
									
								</div>
							</div>
						</div>
						<div class="clearfix pt-3 groom-bride">
						  	<span class="float-left">40 Brides</span>
						  	<span class="float-right">60 groom</span>
						</div>
					</div>
				</div>
			<!-- </div>
			<div class="col-md-3"> -->
				<div class="sub-dashboard card" style="background-color:#62b0c5">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="admin-icon">
									<div class="d-table h-100 w-100">
										<div class="d-table-cell align-middle text-center">
											<i class="fas fa-user"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="admin-text">
									<h4>80 <small style="font-size: 16px" class="pl-2">Verified</small></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- </div>
			<div class="col-md-3"> -->
				<div class="sub-dashboard card" style="background-color:#62c5a7">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="admin-icon">
									<div class="d-table h-100 w-100">
										<div class="d-table-cell align-middle text-center">
											<i class="fas fa-user"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="admin-text">
									<h4>50 <small style="font-size: 16px" class="pl-2">Paid</small></h4>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			<!-- </div> -->
		</div>
		<div class="Registration my-5">
			<h5>New 5 Registrations</h5>
			<div class="row">
				<div class="col-9">
					<table class="patient-table table table-hover my-5">
						<thead>
							<th scope="col" class="w-20">Sr. No.</th>
						    <th scope="col" class="w-25">Photo</th>
						    <th scope="col" class="w-25">Users Name</th>
						    <th scope="col" class="w-25">contact</th>
						</thead>
						<tbody>
							<tr data-url="new-patient-detail.html">
								<th scope="row">1</th>
						      	<td class="text-center">
						      		<img src="./img/student.png" class="student-img mx-auto"  alt="student img" />
						      	</td>
						      	<td>John Doe</td>
						      	<td>+91 8887778882</td>
							</tr>
							<tr data-url="new-patient-detail.html">
								<th scope="row">2</th>
						      	<td class="text-center">
						      		<img src="./img/student.png" class="student-img mx-auto"  alt="student img" />
						      	</td>
						      	<td>John Doe</td>
						      	<td>+91 8887778882</td>
							</tr>
							<tr data-url="new-patient-detail.html">
								<th scope="row">3</th>
						      	<td class="text-center">
						      		<img src="./img/student.png" class="student-img mx-auto"  alt="student img" />
						      	</td>
						      	<td>John Doe</td>
						      	<td>+91 8887778882</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
	