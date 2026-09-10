import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/cadastro_usuario.js', 
                'resources/css/cadastro.css', 
                'resources/js/login.js',
                'resources/js/menu_principal.js',
                'resources/js/criacao_personagem.js',
                'resources/js/cadastro_habilidade.js',
                'resources/js/cadastro_tecnica.js',
                'resources/js/cadastro_classe.js',
                'resources/js/cadastro_raca.js',
                'resources/js/classe_habilidade.js'
                ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
