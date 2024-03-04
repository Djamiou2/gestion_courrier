@extends('layouts.master')

@section('content')
    @livewire('edit-courrier', ['courriers' => $courrier])
@endsection
