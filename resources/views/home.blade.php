@extends('layouts.app')

@section('content')
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>{{ __('Usuários Cadastrados') }}</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <strong>{{ $user->name }}</strong> - {{ $user->email }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
