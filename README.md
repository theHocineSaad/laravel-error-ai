<img width="935" height="383" alt="483751021-05b78dc2-de69-476e-b177-acb919404d72 (1)" src="https://github.com/user-attachments/assets/cdd445b5-c771-4e3a-91a2-100a49c72483" />

# Laravel Error AI

Add “Ask AI” buttons to Laravel’s error page to quickly get help from ChatGPT or Claude. No API keys. No backend calls. Just smart links and beautiful UI.

## Requirements

- Laravel v12.25.0 or higher.
- If your project was originally created on Laravel versions earlier than 11.9, make sure to remove `spatie/laravel-ignition` otherwise it will override Laravel’s built-in error page and the “Copy as Markdown” and “Ask AI” buttons won’t appear.

## Installation

1. Install the package (typically as a dev dependency):
```bash
composer require --dev thehocinesaad/laravel-error-ai
```

2. If `spatie/laravel-ignition` is installed on your project, uninstall it (otherwise it will override Laravel's built-in error page):
```bash
composer remove spatie/laravel-ignition
```

## Usage

Trigger an exception locally and open the error page. You’ll see:

- A “Copy as Markdown” button
- An “Ask AI” dropdown with quick links to ChatGPT and Claude, prefilled with your exception’s context

Click a provider to open it in your browser with the context ready to go.

## Contributing

Issues and PRs are welcome. Please keep changes focused and include concise descriptions.
