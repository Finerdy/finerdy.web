import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    // Match the prefix used by Jigsaw's `vite()` helper so asset URLs
    // emitted from inside processed CSS (e.g. @fontsource woff2 files)
    // resolve to the correct path once Jigsaw copies /source/assets/build
    // into the deployed site at /assets/build.
    base: '/assets/build/',
    plugins: [
        jigsaw({
            input: ['source/_assets/js/main.js', 'source/_assets/css/main.css'],
            refresh: true,
        }),
        tailwindcss()
    ],
});
