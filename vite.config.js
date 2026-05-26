import path from 'path';
import {defineConfig} from 'vite';

export default defineConfig(() => {
  return {
    plugins: [],
    resolve: {
      alias: {
        '@': path.resolve(__dirname, '.'),
      },
    },
    build: {
      rollupOptions: {
        input: {
          main: path.resolve(__dirname, 'index.html'),
          hizmetler: path.resolve(__dirname, 'hizmetler.html'),
          iletisim: path.resolve(__dirname, 'iletisim.html'),
          'burun-estetigi': path.resolve(__dirname, 'burun-estetigi.html'),
          arama: path.resolve(__dirname, 'arama.html'),
          404: path.resolve(__dirname, '404.html'),
        },
      },
    },
    server: {
      // HMR is disabled in AI Studio via DISABLE_HMR env var.
      // Do not modify—file watching is disabled to prevent flickering during agent edits.
      hmr: process.env.DISABLE_HMR !== 'true',
      // Disable file watching when DISABLE_HMR is true to save CPU during agent edits.
      watch: process.env.DISABLE_HMR === 'true' ? null : {},
    },
  };
});
