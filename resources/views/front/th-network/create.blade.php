@extends('front.layouts.app')

@section('css')
	@livewireStyles
@endsection

@section('content')
<section class="top-space under-development">
	@if(empty($communityGroup))
	@livewire('t-h-network.create')
	@else
	@livewire('t-h-network.create', ['communityGroup' => $communityGroup])
	@endif
</section>
	
@endsection

@section('js')
	
@endsection