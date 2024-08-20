@extends('layouts.app')

@section('content')
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>{{ __('Redefinir Senha') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Senha') }}</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">{{ __('Redefinir Senha') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
