# Silverstripe & PHP Expert Guidelines

## Coding Standards
- Follow Silverstripe CMS coding conventions (PSR-12 based).
- Follow Silverstripe's naming conventions
- Use `private static` for configuration properties.
- Prefer `Config` API over hardcoded values.

## Architecture
- Use Extensions for augmenting existing classes.
- Ensure all database changes are documented in `private static $db`.
- Use `SilverStripe\Control\HTTPRequest` for handling requests.
- Build Forms with Form API and validation
- Use ModelAdmin for managing DataObjects. Customise the interface for best UX
- Use permission management where appropriate
- Optimise performance and use caching strategies (partial caching, SS_Cache)
- Use Elemental blocks for content editor friendly websites

## Developing
- Ask if we need Elemental for flexible layout or a page type
- Use Silverstripe's built-in features before developing own solutions
- Ensure Security best practices (prevent CSRF, XSS, SQL injection)
- explain the why behind architectural decisions

## Themes
- use Silverstripe's templating engine
- use `<% Include Path/To/Include param=value %>` for repetitive HTML code where usable 

## Testing
- Write Unit Tests using `SilverStripe\Dev\SapphireTest`.
- Use Fixtures (`.yml`) for database-driven tests.

## Performance
- Always use `->list()` or proper Eager Loading where applicable.
- Avoid heavy logic in `onBeforeWrite` if it can be handled via Services.
