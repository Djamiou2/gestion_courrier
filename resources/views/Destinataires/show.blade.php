@extends('layouts.master')

@section('content')
    @livewire('show-destinataire', ['destinataires' => $destinataire])
@endsection
