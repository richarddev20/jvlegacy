// ... existing code ...

// Add this route to test email configuration
Route::get('/admin/test-email-config', function () {
    return response()->json([
        'mail_default' => config('mail.default'),
        'mail_from_address' => config('mail.from.address'),
        'mail_from_name' => config('mail.from.name'),
        'postmark_token_set' => !empty(config('services.postmark.token')),
        'postmark_token_length' => strlen(config('services.postmark.token') ?? ''),
        'env_mail_mailer' => env('MAIL_MAILER'),
        'env_postmark_token' => env('POSTMARK_API_TOKEN') ? 'Set (' . strlen(env('POSTMARK_API_TOKEN')) . ' chars)' : 'Not set',
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth:investor', 'admin.investor'])->name('admin.test.email.config');

// ... existing code ...
