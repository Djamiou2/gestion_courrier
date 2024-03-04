@extends('layouts.master')

@section('content')
    @livewire('edit-destinataire', ['destinataires' => $destinataire])
@endsection
