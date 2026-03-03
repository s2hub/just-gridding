# Frontend Development Guidelines

This project uses a modern frontend stack based on Vite, TailwindCSS 4, and Silverstripe CMS.

## Theme Structure
The default theme is located in `themes/mytheme`.

### Directory Layout
- `src/css/`: Main CSS entry points (e.g., `app.css`, `editor.css`).
- `src/javascript/`: JavaScript modules and entry points.
- `templates/`: Silverstripe `.ss` templates.
- `dist/`: Compiled production assets (managed by Vite).
- `images/` & `fonts/`: Static assets used within the theme.

## Vite Integration
We use `atwx/silverstripe-vitehelper` to bridge Vite with the Silverstripe backend.

### Development Workflow
You can run these commands from the project root using DDEV:

1. **Install dependencies**:
   ```bash
   ddev yarn --cwd=themes/mytheme
   ```
2. **Start the Vite dev server**:
   ```bash
   ddev yarn --cwd=themes/mytheme run dev
   ```
   *Alternatively, navigate to the theme directory:* `cd themes/mytheme && ddev yarn run dev`.
3. The dev server runs on port `5173`. DDEV is configured to proxy this port.
4. Ensure `VITE_DEV_SERVER_URL` is set in your `.env` file (e.g., `https://starter-ddev.ddev.site:5173/`).

### Production Build
Run the following command to generate optimized assets in the `dist/` folder:
```bash
ddev yarn --cwd=themes/mytheme build
```
*(Or run `yarn build` directly inside the theme directory if you have yarn installed locally).*

### Template Integration
Include the Vite client and assets in your `Page.ss` (or main layout):
```html
$ViteClient.RAW
<link rel="stylesheet" href="$Vite("src/css/app.css")">
<script type="module" src="$Vite("src/javascript/index.js")"></script>
```

## TailwindCSS 4
This project utilizes **TailwindCSS v4** with the Vite plugin `@tailwindcss/vite`.

- **CSS-First Configuration**: Customizations should primarily be done in `src/css/app.css` using the `@theme` block.
- **Automatic Content Detection**: Tailwind 4 automatically scans your templates for class usage.
- **Directives**: Use `@theme` for variables and `@utility` for custom utilities if needed.

## Creating a New Project / Theme
When starting a new project or custom theme:
1. Create a new folder under `themes/`.
2. Copy `package.json` and `vite.config.mjs` from an existing theme.
3. Install dependencies: `ddev yarn --cwd=themes/yourtheme`.
4. Update `app/_config/theme.yml` to point to the new `manifest_path`:
   ```yaml
   Atwx\ViteHelper\Helper\ViteHelper:
     manifest_path: "/themes/yourtheme/dist/.vite/manifest.json"
   ```
5. Update `SilverStripe\View\SSViewer` themes configuration in `theme.yml`.
6. Run `ddev build` to flush Silverstripe's configuration cache.

## Useful DDEV Commands
Aside from frontend-specific commands, these are useful for Silverstripe:
- `ddev build`: Rebuild the database and flush the cache.
- `ddev sake tasks`: List available Silverstripe tasks.
- `ddev sake db:build -f`: Force a database rebuild.

## Best Practices
- Keep JavaScript modular and use ESM imports.
- Use Tailwind utility classes for styling whenever possible.
- Ensure the `editor.css` is maintained for a consistent experience in the CMS HTMLEditor.
- Always run `ddev yarn --cwd=themes/mytheme build` before deploying to ensure assets are updated in the repository (unless handled by CI/CD).
