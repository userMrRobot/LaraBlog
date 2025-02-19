import './bootstrap';
import { createApp } from 'vue';
import router from './router'; // Подключаем маршрутизацию
import App from './App.vue';

//создается главное приложение
const app = createApp(App);
//подключаются другие файлы вью

app.use(router); // Используем vue-router

// Включаем Vue DevTools
app.config.devtools = true;

// app.component('example-component', ExampleComponent);
//монтируется приложение в контейнер
app.mount('#vue-app');
