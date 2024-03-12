@extends('layouts.master')

@section('content')
    @livewire('show-expediteur', ['expediteurs' => $expediteur])
@endsection
