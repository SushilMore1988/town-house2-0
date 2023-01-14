@extends('admin.layouts.app')
@section('content')
	<div class=" pt-3 pb-2 border-bottom">
		<div class="form-row py-4">
			<h1 class="col-6">Notifications</h1>
			{{-- <a href="{{ route('admin.facilities') }}" class="btn btn-success">Create Facility</a> --}}
		</div>
	</div>
	<table class="my-4 display patient-table table table-bordered table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">	Sr. No. 			</th>
			    <th scope="col">	Notification		</th>
			    <th scope="col">	Action				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr>
					<th scope="row">{{$loop->index+1}}</th>
					<td><a href="{{$notification->data['link']}}" class="text-dark"> {{$notification->data['message']}} </a>	</td>
			      	<td>
			      		{!! Form::open(['method' => 'get', 'route' => ['admin.notification.destroy'] ]) !!}
			      		<input type="hidden" value="{{$notification->id}}" name="notification">
			      		{{-- <a href="{{route('admin.facility.destroy',$facility->id)}}"><i class="fas fa-trash-alt"></i></a> --}}
			      		<button type="submit"><i class="fas fa-trash-alt"></i></button>
                        {!! Form::close() !!}
			      	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection