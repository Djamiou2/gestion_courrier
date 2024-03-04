@extends('layouts.master')

@section('content')
    @livewire('edit-expediteur', ['expediteurs' => $expediteur])
@endsection
