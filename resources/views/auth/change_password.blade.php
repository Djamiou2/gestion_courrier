@extends('layouts.master')

@section('content')
    <div class="card-body pt-4 p-3 m-4">
        <div class="col-10 align-items-center justify-content-center mb-2 ">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.changement') }}">
                @csrf
                @method('POST')

                <div class="form-group row">
                    <label for="current_password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Ancien mot de passe') }}</label>
                    <div class="col-md-6">
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                            required autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Nouveau mot de passe') }}</label>
                    <div class="col-md-6">
                        <input id="new_password" type="password"
                            class="form-control @error('new_password') is-invalid @enderror" name="new_password" required
                            autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du nouveau mot de passe') }}</label>
                    <div class="col-md-6">
                        <input id="password_confirmation" type="password"
                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Changer le mot de passe') }}
                        </button>
                        <a class="btn btn-link" href="{{ route('home') }}">
                            {{ __('Retour à l\'acceuil') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
