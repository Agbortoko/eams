import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
  plugins: [
    fullReload(['**/*.php', '**/*.css', '**/*.js']),  // Watch for changes in PHP files
  ],

  build: {
    outDir: './resources/dist', 
    manifest: true,
    rollupOptions: {
      input: './resources/js/app.js',
    },
  },

  server: {
    proxy: {
      '/eams': {
        target: 'http://localhost',
        changeOrigin: true
      }
    }
  },

});