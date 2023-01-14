@extends('admin.layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Social Interest</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#createModal"> Create New Interest</a>
            @endcan
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
  @php
      $i = 0;
  @endphp
    @foreach ($professionalInterests as $key => $professionalInterest)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $professionalInterest->name }}</td>
        <td>
            @can('role-edit')
                <a class="btn btn-primary edit" data-value="{{$professionalInterest->id}}" data-name="{{$professionalInterest->name}}" href="#">Edit</a>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

<div class="modal" id="createModal">
    <div class="modal-dialog introModule">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Social Interest</h4>
                <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.social-interests.store')}}">
                    @csrf
                    <div class="form-row">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter name of professional interest" required="required" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback d-block">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div id="otp-error"></div>
                    <button type="submit" class="btn btn-block btn-dark mt-3"> Submit </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editModal">
    <div class="modal-dialog introModule">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Social Interest</h4>
                <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.social-interests.update')}}">
                    @csrf
                    <input type="hidden" id="professional_interest_id" value="" name="professional_interest_id">
                    <div class="form-row">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter name of professional interest" id="pi_name" required="required" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback d-block">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div id="otp-error"></div>
                    <button type="submit" class="btn btn-block btn-dark mt-3"> Submit </button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- {!! $professionalInterests->render() !!} --}}
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            @error('from')
                $('#{{$message}}').modal('toggle');
            @enderror

            $(document).on('click', '.edit', function(){
                $('#professional_interest_id').val($(this).data('value'));
                $('#pi_name').val($(this).data('name'));
                $('#editModal').modal('toggle');
            });
        });
    </script>
@endsection