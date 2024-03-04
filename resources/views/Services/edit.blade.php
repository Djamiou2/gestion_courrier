@extends('layouts.master')

@section('content')
    @livewire('edit-service', ['services' => $service])
@endsection
