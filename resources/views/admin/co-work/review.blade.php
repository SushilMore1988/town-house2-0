@extends('admin.layouts.app')
@section('content')
<div class=" pt-3 pb-2 border-bottom">
	<div class="form-row py-4">
		<h1 class="col-6">Add CoWorkSpace Master</h1>
		<div class="col-sm-6 text-right">
			<a href="payment-list.html" class="form-group">
				<button type="button" class="btn">cancel</button>
			</a>
		</div>
	</div>
</div>
<div class="form-box mt-3 py-4">
	<div class="col-lg-8 col-sm-12">
		<div class="form-row">
			<div class="col-sm-12 col-lg-6">
				<div class="form-group">
					<label class="w-100">Select Package<span class="required">*</span> :</label><br />
					<select name='price' title="Price">
						<option>select</option>
						<option>3 Months</option>
						<option>6 Months </option>
						<option>Unlimited</option>
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-lg-6">
				<div class="form=form-group">
					<label>Select User<span class="required">*</span> :</label><br />
					<select name='price' title="Price">
						<option>select</option>
						<option>male</option>
						<option>female</option>
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-lg-6">
				<div class="form-group">
					<label class="w-100">Payment Mode<span class="required">*</span> :</label><br />
					<select name='price' title="Price">
						<option>select</option>
						<option>Online Bank</option>
						<option>Cash</option>
						<option>Google pay</option>
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-lg-6">
				<div class="form-group">
					<label class="w-100">Transaction ID :</label><br />
					<input type="text" name="title" title="ipd-no" />
				</div>
			</div>
			<div class="col-sm-12 col-lg-6">
				<div class="form-group">
					<label class="w-100">Payment received Date :</label><br />
					<input type="gmail" name="title" title="date" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-sm-12">
		<div class="form-row py-4">
			<div class="col-sm-12 text-left">
				<div class="form-group">
					<button type="button" class="btn">Save details</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
