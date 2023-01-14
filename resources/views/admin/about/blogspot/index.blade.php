@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">BlogSpot List</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ route('admin.about.blogspot.create') }}" class="btn">Create</a>
			</div>
		</div>
	</div>
	@if(session()->has('message'))
		 <p class="alert alert-success time-out-alert">{{session()->get('message')}}</p>
	@elseif(session()->has('error'))
		 <p class="alert alert-danger time-out-alert">{{session()->get('error')}}</p>
	@endif
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col" >Sr. No.</th>
				<th scope="col" >Title</th>
				<th scope="col" >Written By</th>
				<th scope="col" >Action</th>
			    
			</tr>
		</thead>
		<tbody>
			@foreach($blogSpots as $blogSpot)
				<tr >
					<th>{{$loop->index+1}}</th>
			      	<td> {{$blogSpot->title}}</td>
			      	<td> {{$blogSpot->written_by}}</td>
			      	<td>
			      		<a href="{{route('admin.about.blogspot.edit', $blogSpot->id)}}" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
			      		<button  class="btn edit-btn delete-blogspot" data-blogspot_id="{{$blogSpot->id}}"><i class="far fa-trash-alt"></i></button>
			      		{!! Form::model($blogSpot, ['id' => 'delete-blogspot-'.$blogSpot->id, 'route' => ['admin.about.blogspot.destroy', $blogSpot->id]]) !!}
			      			{{ Form::hidden('id', $blogSpot->id) }}
			      		{!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('js')
	<script type="text/javascript">
		$(document).on('click', '.delete-blogspot', function(){
			if(confirm("You will not revert action. Do you want to delete this blog spot?")){
	            $('#delete-blogspot-'+$(this).data('blogspot_id')).submit();
	        }
		});
	</script>
@endsection