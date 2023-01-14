@extends('admin.layouts.app')

@section('css')
	
@endsection

@section('content')
	<div class="pb-2 border-bottom">
		<div class="form-row">
			<h1 class="col-6">Team Member List</h1>
			<div class="col-sm-6 text-right">
				<a href="{{ route('admin.about.team.create') }}" class="btn">Create</a>
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
				<th scope="col" >Name</th>
				<th scope="col" >Attribue</th>
				<th scope="col" >Action</th>
			    
			</tr>
		</thead>
		<tbody>
			@foreach($team as $member)
				<tr >
					<th>{{$loop->index+1}}</th>
			      	<td> {{$member->name}}</td>
			      	<td> {{$member->attribute}}</td>
			      	<td>
			      		<a href="{{route('admin.about.team.edit', $member->id)}}" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
			      		<button  class="btn edit-btn delete-member" data-member_id="{{$member->id}}"><i class="far fa-trash-alt"></i></button>
			      		{!! Form::model($member, ['id' => 'delete-member-'.$member->id, 'route' => ['admin.about.team.destroy', $member->id]]) !!}
			      			{{ Form::hidden('id', $member->id) }}
			      		{!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

@section('js')
	
	
	<script type="text/javascript">
		$(document).on('click', '.delete-member', function(){
			if(confirm("You will not revert action. Do you want to delete this team member?")){
	            $('#delete-member-'+$(this).data('member_id')).submit();
	        }
		});
	</script>
@endsection