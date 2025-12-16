<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Project;
use App\Models\Update;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public Account $account;
    public ?Project $project;
    public Update $update;

    public function __construct(Account $account, ?Project $project, Update $update)
    {
        $this->account = $account;
        $this->project = $project;
        // Load images relationship if not already loaded
        if (!$update->relationLoaded('images')) {
            $update->load('images');
        }
        $this->update = $update;
    }

    public function build()
    {
        $name = $this->account->person ? 
            ($this->account->person->first_name . ' ' . $this->account->person->last_name) : 
            ($this->account->company->name ?? 'Investor');

        $projectName = $this->project?->name ?? 'Your Investment';
        $projectUrl = $this->project 
            ? route('investor.dashboard') . '#project-' . $this->project->id
            : route('investor.dashboard');

        // Build images/files HTML if any exist
        $imagesHtml = '';
        $imagesText = '';
        if ($this->update->images && $this->update->images->count() > 0) {
            $imagesHtml = '<div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid #e2e8f0;"><h3 style="font-size: 16px; font-weight: 600; margin-bottom: 12px; color: #1e293b;">Attachments:</h3><ul style="list-style: none; padding: 0; margin: 0;">';
            $imagesText = "\n\nAttachments:\n";
            
            foreach ($this->update->images as $image) {
                $fileUrl = $image->url;
                $fileName = htmlspecialchars($image->file_name ?? 'File');
                $description = htmlspecialchars($image->description ?? '');
                
                if ($image->is_image) {
                    $imagesHtml .= '<li style="margin-bottom: 12px;"><a href="' . $fileUrl . '" target="_blank" style="color: #3b82f6; text-decoration: none; display: inline-flex; align-items: center;"><i class="fas fa-image" style="margin-right: 8px;"></i>' . $fileName . '</a>';
                    if ($description) {
                        $imagesHtml .= ' <span style="color: #64748b; font-size: 14px;">- ' . $description . '</span>';
                    }
                    $imagesHtml .= '</li>';
                } else {
                    $imagesHtml .= '<li style="margin-bottom: 12px;"><a href="' . $fileUrl . '" target="_blank" style="color: #3b82f6; text-decoration: none; display: inline-flex; align-items: center;"><i class="fas fa-file" style="margin-right: 8px;"></i>' . $fileName . '</a>';
                    if ($description) {
                        $imagesHtml .= ' <span style="color: #64748b; font-size: 14px;">- ' . $description . '</span>';
                    }
                    $imagesHtml .= '</li>';
                }
                
                $imagesText .= "- " . $fileName;
                if ($description) {
                    $imagesText .= " (" . $description . ")";
                }
                $imagesText .= "\n  " . $fileUrl . "\n";
            }
            
            $imagesHtml .= '</ul></div>';
        }

        $variables = [
            'name' => $name,
            'project_name' => $projectName,
            'update_content' => $this->update->comment ?? '',
            'update_date' => $this->update->sent_on ? $this->update->sent_on->format('d M Y') : date('d M Y'),
            'dashboard_url' => route('investor.dashboard'),
            'project_url' => $projectUrl,
            'attachments_html' => $imagesHtml,
            'attachments_text' => $imagesText,
        ];

        $template = EmailTemplateService::getTemplateWithFallback('project_update', $variables);

        return $this->subject($template['subject'])
            ->html($template['html'])
            ->text($template['text']);
    }
}

