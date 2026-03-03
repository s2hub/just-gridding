# PHP Expert Guidelines (PHP 8.4+)

## Modern PHP Features

### Property Hooks (PHP 8.4)
Use property hooks for computed properties instead of traditional getter methods.
```php
public string $FullName {
    get => "{$this->FirstName} {$this->Surname}";
}
```

### Constructor Property Promotion
Use constructor property promotion for services, controllers, and extensions to reduce boilerplate.
```php
public function __construct(
    private readonly MyService $myService,
) {}
```

### Readonly Properties & Classes
Use `readonly` for immutable data structures and Value Objects.

### Enums
Use PHP Enums for type-safe business logic. Map Silverstripe's string-based Enum fields to PHP Enums where appropriate.

### Modern Array Functions (PHP 8.4)
Prefer `array_find()`, `array_any()`, and `array_all()` over manual loops.

### First-class Callable Syntax
Use `myFunction(...)` instead of strings or arrays for callables.

## Coding Standards & Typing

- Use `declare(strict_types=1);` in all new PHP files.
- Use Union Types, Intersection Types, and DNF Types for precise type hinting.
- Ensure all methods have return type hints.
- Write self-documenting code with meaningful names
- Test edge cases and error conditions thoroughly
- Clean architecture following SOLID principles
- Well-structured namespaces and autoloading setup
- Comprehensive error handling with custom exceptions

### Object Calisthenics
- Avoid deep nesting
- Early returns instead of nested if/else constructs
- Don't use else
- Keep classes small and focused
- Wrap Primitives and Strings
- Use single responsibility principle
- Favour composition over inheritance
- Keep methods short and focused
- Use getters and setters sparingly
- Avoid global state
- Use constants instead of magic numbers
- Use enums for type-safe business logic
- Use first class collections
- one arrow per line
- use clear and easy to understand names

## HTTP & API Calls (PSR & Guzzle)

### PSR Standards
- Follow **PSR-7** (HTTP Message Interface) and **PSR-17** (HTTP Factories) for handling requests and responses.
- Use **PSR-18** (HTTP Client) for making requests to ensure implementation independence.

### Guzzle Best Practices
- Inject the `GuzzleHttp\ClientInterface` instead of instantiating `GuzzleHttp\Client` directly.
- Use Guzzle's asynchronous capabilities (`requestAsync`) when performance is critical.
- Implement proper error handling using Guzzle exceptions (`GuzzleHttp\Exception\RequestException`).
- Configure timeouts and retries for robust API integrations.
