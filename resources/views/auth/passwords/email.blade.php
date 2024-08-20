@extends('layouts.app')

@section('content')
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>{{ __('Recuperar Senha') }}</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">{{ __('Enviar link de redefinição de senha') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
