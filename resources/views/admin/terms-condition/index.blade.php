@extends('admin.layouts.app')

@section('content')

<div class="col-10 main-menu">
	<div id="successMsg"></div>
	<table class="patient-table table table-hover my-5">
		<thead>
			<th scope="col" class="w-20">Sr. No.</th>
		    <th scope="col" class="w-25">CoWorkSpace Name</th>
		    <th>Name</th>
		    <th>Contact</th>
		    <th>City</th>
		    <th>Terms & Condition</th>
		</thead>
		<tbody>
			@foreach($customizedUsers as $customizedUser)
			<tr data-url="new-patient-detail.html">
		      	<td>{{$loop->index + 1}}</td>
		      	<td> {{ $customizedUser->name }}</td>
		      	<td>{{$customizedUser->user->fname}} {{$customizedUser->user->lname}}</td>
		      	<td>{{$customizedUser->user->email}}<br>
		      		{{$customizedUser->user->phone}}
		      	</td>
		      	@php
		      		$city = App\Models\City::where('id', $customizedUser->city_id)->first();
		      	@endphp
		      	<td>{{$city->name}}</td>
		      	<td>
		      		@if($customizedUser->agreement != null)
		      			<button type="button" class="btn btn-success" >Agreement Uploaded</button>
		      		@else
		      			<button type="button" class="btn btn-success agreementUploadBtn" data-value="{{ $customizedUser->id }}">Upload agreement</button>
		      		@endif
		      	</td>	
			</tr>
			@endforeach
			{!! Form::open(['id'=>'agreementForm', 'files'=>true]) !!}
					{!! Form::hidden('cws_id', null, ['id' => 'cws_id']) !!}	
					<input type="file" name="agreement" style="display:none;" class="agreementUploader" accept=".pdf">
			{!! Form::close() !!}		
		</tbody>
	</table>
</div>

@endsection

@section('js')
	<script type="text/javascript">
			$('body').on('click', '.agreementUploadBtn', function(){
				$('#cws_id').val($(this).data('value'));		
				$('.agreementUploader').trigger('click');
			});

			$('.agreementUploader').on('change',function(){ 
				$("#agreementForm").submit(); 
			});

			$('#agreementForm').on('submit',(function(e) {  
		        e.preventDefault();
       			var url = "{{route('admin.agreement.store')}}";

		        $.ajax({
		        	headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            type:'POST',
		            url: url,
		            data: new FormData(this),
		            dataType: 'JSON',
		            cache: false,
		            contentType: false,
		            processData: false,
		            
		            success:function(data){ 
		    			// alert('success');
		    			window.location.reload();
		            }
		            
		        });
		    }));

	</script>	
	
@endsection