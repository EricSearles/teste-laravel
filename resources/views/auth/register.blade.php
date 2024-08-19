@extends('layouts.app')

@section('content')
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>{{ __('Cadastro') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome Completo:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Senha:</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="zip_code">CEP:</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" required>
                                <button type="button" id="search_address" class="btn btn-primary mt-2">Buscar Endereço</button>
                                @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="street">Rua:</label>
                                <input type="text" class="form-control" id="street" name="street" value="{{ old('street') }}" required>
                                @error('street')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="neighborhood">Bairro:</label>
                                <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}" required>
                                @error('neighborhood')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number">Número:</label>
                                <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" required>
                                @error('number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">Cidade:</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="state">Estado:</label>
                                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search_address').addEventListener('click', function() {
            let cep = document.getElementById('zip_code').value;

            if (cep.length === 8 || cep.length === 9) { // Verifica se o CEP tem 8 dígitos (ou 9 com hífen)
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('street').value = data.logradouro;
                            document.getElementById('neighborhood').value = data.bairro;
                            document.getElementById('city').value = data.localidade;
                            document.getElementById('state').value = data.uf;
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar o endereço:', error);
                    });
            } else {
                alert('Por favor, insira um CEP válido.');
            }
        });
    </script>
@endsection
