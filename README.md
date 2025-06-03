<img alt="TrivialForge" width="100%" align="center" src="https://github.com/trivialmass/TrivialForge/blob/main/screenshot.png" />

# TrivialForge Theme

Welcome to **TrivialForge**, a minimalist WordPress theme crafted by [TrivialMass](https://trivialmass.com). This theme is designed to work seamlessly with ACF (Advanced Custom Fields), Gutenberg, and the Tailwind CSS library.

## 🎨 Features

- **Minimalist Skeleton**: Clean and efficient structure to kickstart your projects.
- **Advanced Custom Fields (ACF)**: Easy integration for custom fields.
- **Gutenberg**: Full compatibility with WordPress's block editor.
- **Tailwind CSS**: Utility-first CSS framework for rapid UI development.
- **Webpack**: Modern bundling with development and production scripts.

## 🚀 Getting Started

### Prerequisites

- **Node.js**: Ensure you have Node.js installed on your machine.
- **WordPress**: Make sure your WordPress installation is set up.

### Installation

1. **Clone the repository**:

   ```sh
   git clone https://github.com/trivialmass/trivialforge.git
   cd trivialforge
   ```

2. **Install dependencies**:

   ```sh
   npm install
   ```

3. **Build the theme**:
   - For production:
     ```sh
     npm run prod
     ```
   - For development (with watch mode):
     ```sh
     npm run dev
     ```

### Theme Structure

```
├── TrivialForge/
│   ├── acf-json/
│   ├── dist/
│   │   ├── css/
│   │   │   └── bundle.css
│   │   ├── js/
│   │   │   └── bundle.js
│   │   ├── fonts/
│   │   │   ├── *.woff
│   │   │   └── *.ttf
│   ├── functions/
│   │   ├── components/
│   │   ├── general/
│   │   ├── gutenberg/
│   │   └── helpers/
│   ├── node_modules/
│   ├── src/
│   │   ├── fonts/
│   │   │   ├── Baskerville/
│   │   │   │   ├── Baskerville-Regular.ttf
│   │   │   │   └── Baskerville-Regular.woff
│   │   │   ├── Roboto/
│   │   │   │   ├── Roboto-Regular.ttf
│   │   │   │   └── Roboto-Regular.woff
│   │   ├── js/
│   │   │   ├── modules/
│   │   │   └── bundle.js
│   │   ├── scss/
│   │   │   ├── components/
│   │   │   ├── bundle.scss
│   │   │   ├── general.scss
│   │   │   └── typography.scss
│   ├── template-parts/
│   │   ├── components/
│   │   ├── gutenberg-blocks/
│   ├── .gitattributes
│   ├── .gitignore
│   ├── 404.php
│   ├── archive.php
│   ├── comments.php
│   ├── footer.php
│   ├── functions.php
│   ├── header.php
│   ├── index.php
│   ├── LICENSE
│   ├── package-lock.json
│   ├── package.json
│   ├── page.php
│   ├── postcss.config.js
│   ├── README.md
│   ├── screenshot.png
│   ├── search.php
│   ├── searchform.php
│   ├── single.php
│   ├── style.css
│   ├── tailwind.config.js
│   ├── template-base.php
│   ├── theme.js
│   ├── tsconfig.json
│   └── webpack.config.js
```

## 📚 Usage

### Custom Fields

- Use ACF to create custom fields and display them in your theme templates.
- Save ACF field groups as JSON in the `acf-json/` folder for version control.

### Gutenberg Blocks

- Create custom Gutenberg blocks by leveraging Tailwind CSS for styling.
- Ensure your blocks are registered in `functions.php`.

## 🛠️ Development

### Webpack Scripts

- **Production Build**: Optimized for deployment.

  ```sh
  npm run prod
  ```

- **Development Build**: Watches for changes and rebuilds.
  ```sh
  npm run dev
  ```

### Tailwind SCSS

- Customize your Tailwind configuration in `tailwind.config.js`.
- All your theme variables such as fontFamily, spacing, colors, .. shoul be
  declared in the theme.js file.
- Add your custom styles in `src/scss/`.

---

Crafted with ❤️ by [TrivialMass](https://trivialmass.com)
