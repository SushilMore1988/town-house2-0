@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">BlogSpot List</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ route('admin.about.term.create') }}" class="btn">Create</a>
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
				<th scope="col" >Category By</th>
				<th scope="col" >Action</th>
			    
			</tr>
		</thead>
		<tbody>
			@foreach($terms as $term)
				<tr >
					<th>{{$loop->index+1}}</th>
			      	<td> {{$term->title}}</td>
			      	<td> {{$term->category}}</td>
			      	<td>
			      		<a href="{{route('admin.about.term.edit', $term->id)}}" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
			      		<button  class="btn edit-btn delete-term" data-term_id="{{$term->id}}"><i class="far fa-trash-alt"></i></button>
			      		{!! Form::model($term, ['id' => 'delete-term-'.$term->id, 'route' => ['admin.about.term.destroy', $term->id]]) !!}
			      			{{ Form::hidden('id', $term->id) }}
			      		{!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('js')
	
	
	<script type="text/javascript">
		$(document).on('click', '.delete-term', function(){
			if(confirm("You will not revert action. Do you want to delete this terms and condition?")){
	            $('#delete-term-'+$(this).data('term_id')).submit();
	        }
		});
	</script>
@endsection