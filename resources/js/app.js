import './bootstrap';
import axios from 'axios';
window.axios = axios;

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('api_token')}`;
// Adicione o token CSRF e o token de autenticação
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Suponha que o token de API está armazenado no localStorage (após login)
const token = localStorage.getItem('api_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}


