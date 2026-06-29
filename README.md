# StackVera Core

Marketing website and internal dashboard for StackVera Core GmbH, a European IT consultancy for cloud, AI, security and sovereign platforms.

The application is built on a Laravel and [Livewire](https://livewire.laravel.com) stack with a [Flux UI](https://fluxui.dev) component library. It serves a public landing page with a contact form, plus an authenticated area for managing incoming enquiries.

## Tech Stack

- PHP 8.5, Laravel 13
- Livewire 4 with Flux UI (free edition)
- Tailwind CSS 4, Vite
- Laravel Fortify for authentication (login, registration, 2FA, passkeys)
- Pest 4 for testing, Larastan for static analysis, Pint for formatting

## Local Development

The site is served by [Laravel Herd](https://herd.laravel.com) at `https://stackvera_core.test`.

Install dependencies and build assets:

```bash
composer install
npm install
npm run build
```

Run the full development environment (server, Vite, queue, logs) with one command:

```bash
composer dev
```

## Contact Enquiries

The landing page contact form (`POST /contact`) captures enquiries and stores them in the `contact_enquiries` table.

On a successful submission the application:

1. Persists the enquiry (name, optional company, email, message).
2. Sends a branded HTML email to the configured recipient as a queued notification.
3. Redirects back to the contact section with a success message.

### Spam protection

The form is protected by a hidden honeypot field and a rate limiter (`throttle:5,1`). Submissions that fill the honeypot are silently dropped without being stored or mailed.

### Email validation

The email field requires a syntactically valid address with a real top level domain, so values such as `name@local` are rejected.

### Notification recipient

The recipient address is read from `config('services.contact.recipient')`. Set it in your environment:

```dotenv
CONTACT_RECIPIENT=team@stackvera.example
```

If `CONTACT_RECIPIENT` is not set, the application falls back to `MAIL_FROM_ADDRESS`.

### Queue worker

The notification implements `ShouldQueue` and runs on the `database` queue connection, so a worker must be running to deliver emails:

```bash
php artisan queue:work
```

During development you can use `php artisan queue:listen` instead, which reloads code on every job so you do not have to restart the worker after changes. The `composer dev` command already starts a worker for you.

### Branded email template

The notification uses a custom, email safe HTML template at `resources/views/mail/contact-enquiry.blade.php` (with a plain text counterpart) that matches the site branding (logo, brand colors and fonts). Timestamps are displayed in the `Europe/Berlin` timezone while still being stored in UTC.

### Admin list

Authenticated users can review enquiries at `/contact-enquiries`. The Livewire page lists submissions with a read or unread status and supports marking enquiries as read and deleting them. Access is currently limited to authenticated, verified users. A role or policy restriction is planned (see the TODO in `routes/web.php`).

## Testing

Run the test suite:

```bash
php artisan test
```

Run the full quality check (formatting, static analysis and tests), the same command used in CI:

```bash
composer test
```

## License

This project is proprietary software owned by StackVera Core GmbH.
