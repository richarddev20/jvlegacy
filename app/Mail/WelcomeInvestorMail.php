<?php

namespace App\Mail;

use App\Models\Account;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeInvestorMail extends Mailable
{
    use Queueable, SerializesModels;

    public Account $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function build()
    {
        // Ensure relationships are loaded
        if (!$this->account->relationLoaded('person')) {
            $this->account->load('person');
        }
        if (!$this->account->relationLoaded('company')) {
            $this->account->load('company');
        }

        $name = $this->account->person ? 
            ($this->account->person->first_name . ' ' . $this->account->person->last_name) : 
            ($this->account->company->name ?? 'Investor');

        $variables = [
            'name' => $name,
            'email' => $this->account->email,
            'login_url' => route('investor.login'),
            'dashboard_url' => route('investor.dashboard'),
        ];

        $template = EmailTemplateService::getTemplateWithFallback('welcome_investor', $variables);

        \Log::info('WelcomeInvestorMail build()', [
            'account_email' => $this->account->email,
            'name' => $name,
            'template_found' => $template !== null,
            'subject' => $template['subject'] ?? 'N/A',
        ]);

        return $this->subject($template['subject'])
            ->html($template['html'])
            ->text($template['text'])
            ->from(config('mail.from.address'), config('mail.from.name'));
    }
}

