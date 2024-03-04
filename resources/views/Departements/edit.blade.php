@extends('layouts.master')

@section('content')
    @livewire('edit-departement', ['departements' => $departement])
@endsection
