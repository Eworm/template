import { defineConfig } from 'vite';
import path from 'path';
import VitePluginSvgSpritemap from '@spiriit/vite-plugin-svg-spritemap'
import fs from 'fs';

export default defineConfig({
  plugins: [
    VitePluginSvgSpritemap('images-src/sprite/**/*.svg', {
      output: {
        filename: '../images/sprite.svg',
        use: false,
        view: false,
      },
    }),
    cleanJsFolder(),
    injectCssComment(),
  ],
  css: {
    preprocessorOptions: {
      scss: {},
    },
  },
  build: {
    manifest: true,
    outDir: '.',
    emptyOutDir: false,
    assetsInlineLimit: 0,
    rollupOptions: {
      input: {
        style:     'sass/style.scss',
        functions: 'js-src/base/template.init.js',
        lab:       'js-src/base/lab-loader.js',
      },
      output: {
        entryFileNames: (chunk) => {
          if (chunk.name === 'lab')       return 'js/lab.min.[hash].js';
          if (chunk.name === 'functions') return 'js/functions.min.[hash].js';
          return 'js/[name].[hash].js';
        },
        chunkFileNames: 'js/[name].[hash].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name?.endsWith('.css'))  return '[name][extname]';
          if (assetInfo.name?.endsWith('.svg'))  return 'images/[name][extname]';
          if (/\.woff2?$/.test(assetInfo.name)) return 'fonts/[name][extname]';
          return 'assets/[name][extname]';
        },
      },
    },
    minify: 'terser',
    cssMinify: 'esbuild', // minifies CSS but esbuild strips comments
    terserOptions: {
      format: {
        comments: 'all',
      },
    },
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'js-src'),
    },
  },
});

// Plugin to inject the theme comment back into style.css after build
function injectCssComment() {
  return {
    name: 'inject-css-comment',
    closeBundle() {
      const cssPath = path.resolve(__dirname, 'style.css');
      if (fs.existsSync(cssPath)) {
        const comment = `/*!\nTheme Name: Timber template\nTheme URI: http://www.clienturl.nl\nAuthor: Wout Mager\nAuthor URI: http://www.woutmager.nl\nVersion: 1.0\n*/\n`;
        const css = fs.readFileSync(cssPath, 'utf8');
        if (!css.startsWith('/*!')) {
          fs.writeFileSync(cssPath, comment + css);
        }
      }
    }
  }
}

function cleanJsFolder() {
  return {
    name: 'clean-js-folder',
    buildStart() {
      const jsPath = path.resolve(__dirname, 'js');
      if (fs.existsSync(jsPath)) {
        fs.readdirSync(jsPath).forEach(file => {
          if (file.endsWith('.js')) {
            fs.unlinkSync(path.join(jsPath, file));
          }
        });
      }
    }
  }
}
