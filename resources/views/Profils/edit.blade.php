@extends('layouts.master')

@section('content')
    @livewire('edit-profil', ['profils' => $profil])
@endsection
