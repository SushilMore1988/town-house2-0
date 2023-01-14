@extends('front.layouts.app')

@section('css')
@endsection

@section('content')
    @livewire('co-work', ['step' => '1'])
@endsection