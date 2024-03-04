@extends('layouts.master')

@section('content')
    @livewire('edit-user', ['users' => $user])
@endsection
