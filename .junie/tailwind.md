# Tailwind CSS 4 Guidelines

This project utilizes **Tailwind CSS 4** with the Vite plugin `@tailwindcss/vite`. These guidelines ensure consistent, maintainable, and efficient styling.

## Responsive Design (Mobile First)
Always follow a **mobile-first** approach. Use unprefixed classes for mobile and add responsive modifiers for larger screens.

- **Breakpoints**: Use standard Tailwind 4 breakpoints: `sm` (640px), `md` (768px), `lg` (1024px), `xl` (1280px), `2xl` (1536px).
- **Pattern**: `<div class="w-full md:w-1/2 lg:w-1/3">...</div>`
- **Avoid Over-prefixing**: Only use modifiers when changing a property from the mobile version.

## Class Ordering Schema
To keep templates readable, order Tailwind classes following this logical schema:

1.  **Layout**: `position`, `z-index`, `top`, `display`, `flex`, `grid`, `float`.
2.  **Box Model**: `width`, `height`, `margin`, `padding`, `border`.
3.  **Typography**: `font-size`, `font-weight`, `line-height`, `text-align`, `color`.
4.  **Visuals**: `background-color`, `box-shadow`, `opacity`, `border-radius`.
5.  **Interaction**: `hover`, `focus`, `active`, `transition`, `transform`.

*Tip: Use the Prettier plugin for Tailwind CSS to automate this ordering.*

## Dark Mode Implementation
Tailwind 4 uses the `selector` strategy by default or automatically detects system preferences.

- **Usage**: Use the `dark:` modifier (e.g., `bg-white dark:bg-slate-900`).
- **Strategy**: If a manual toggle is needed, ensure the `dark` class is applied to the `<html>` or `<body>` element.
- **Silverstripe Context**: Ensure CMS previews or specific frontend sections handle dark mode gracefully.

## Error Handling & Feedback
Consistent styling for user feedback (especially in Silverstripe forms):

- **Errors**: `text-red-600 dark:text-red-400 border-red-500`
- **Warnings**: `text-amber-600 dark:text-amber-400 border-amber-500`
- **Success**: `text-green-600 dark:text-green-400 border-green-500`
- **Forms**: Use the `@tailwindcss/forms` plugin for better base styles.

## Custom Utilities & Variants (v4 style)
Tailwind 4 promotes a CSS-first configuration. Add custom logic in `src/css/app.css`.

### Custom Utilities
Use the `@utility` directive:
```css
@utility custom-shadow {
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
}
```

### Custom Variants
Use the `@variant` directive for complex states:
```css
@variant hocus (&:hover, &:focus);
```
*Usage in HTML: `<button class="hocus:bg-blue-700">...</button>`*

## Best Practices
- **Consistent Spacing**: Use the default spacing scale (`p-4`, `m-8`) to maintain vertical and horizontal rhythm.
- **Avoid Arbitrary Values**: Prefer theme variables over one-off values (e.g., use `bg-primary` instead of `bg-[#3490dc]`).
- **Semantic HTML**: Use Tailwind on semantic elements. Don't over-nest `<div>` elements just for styling.

## Troubleshooting & Common Pitfalls
- **Classes not generating**: Ensure the file extension is covered by Tailwind's content scanning (usually automatic in v4 for all files in the project).
- **Specificity Issues**: Avoid using `!important` (e.g., `!text-blue-500`) unless absolutely necessary to override third-party styles.
- **Vite HMR**: If styles don't update, check if the Vite dev server is running and the `@ViteClient` is included in the template.
- **Purging**: Remember that dynamic class names like `text-${color}-500` will not be detected. Use full class names or a safelist (in templates/TailwindClasses.ss)
