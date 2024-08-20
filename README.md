<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Projeto Laravel com Sanctum

## Requisitos
- PHP >= 7.3
- Composer
- Node.js & npm
- MySQL ou outro banco de dados

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/usuario/projeto-laravel-sanctum.git
   cd projeto-laravel-sanctum
   
2. Instale as dependências do PHP:
	composer install
	
3. Instale as dependências do Node.js:
	npm install

4. Configure o arquivo .env:
	cp .env.example .env

	Configure as informações do banco de dados
	Configure a URL da aplicação (MIX_APP_URL)
	
5. Gere a chave da aplicação:
	php artisan key:generate

6. Execute as migrações:
    php artisan migrate

7. Compile os assets front-end:
	npm run dev

8. Inicie o servidor local:
	php artisan serve


## Uso
	Acesse a aplicação via http://localhost:8000.
	Utilize a página de cadastro para criar um novo usuário.
	Faça login utilizando as credenciais criadas.
	A página Home exibirá a lista de usuários cadastrados.
	Estrutura do Projeto
	Models: Localizados em app/Models
	Controllers: Localizados em app/Http/Controllers
	Services: Implementações específicas de lógica de negócio
	Views: Localizadas em resources/views
	Frontend: Scripts JavaScript e CSS em resources/js e resources/css
	
## Notas Adicionais
	Este projeto utiliza Sanctum para autenticação de API.
	
    A comunicação frontend-backend é feita via AJAX usando Axios.
	Certifique-se de configurar o CORS corretamente se estiver acessando a API de um domínio diferente.