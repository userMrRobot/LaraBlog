import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Импорт плагина Vue.js

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(), // Плагин Vue.js
    ],
    // настройка для того чтобы npm install работал коректно
    //server:{
      //  host: '0.0.0.0', //чтобы разрешить доступ извне
        //port: 5173, //укажите порт на котором будет работать сервер не 80
    //},
});
