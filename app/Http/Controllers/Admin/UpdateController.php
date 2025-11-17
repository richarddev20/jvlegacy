<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Update;
use App\Models\Investments;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index(Request $request)
    {
        $query = Update::query();

        // Filter by project_id if provided
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->input('project_id'));
        }

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $updates = $query->orderByDesc('sent_on')->paginate(20);

        $projects = Project::orderBy('name')->get();

        return view('admin.updates.index', [
            'updates' => $updates,
            'projects' => $projects,
            'filters' => $request->only(['project_id', 'category']),
        ]);
    }

    public function show($id)
    {
        return view('admin.updates.show');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:legacy.projects,project_id',
            'category' => 'nullable|integer',
            'comment' => 'required|string',
        ]);

        $update = new Update();
        $update->project_id = $validated['project_id'];
        $update->category = $validated['category'] ?? 3;
        $update->comment = $validated['comment'];
        $update->sent_on = now();
        $update->save();

        $emailcount = $this->dispatchBulkEmails($update);

        return redirect()->route('admin.updates.index')
            ->with('success', 'Update posted and ' . $emailcount . ' investors notified.');
    }

    // Separate function for sending bulk emails
    public function sendBulkEmails($id)
    {
        $update = Update::findOrFail($id);
        $emailcount = $this->dispatchBulkEmails($update);

        return redirect()->route('admin.updates.index')
            ->with('success', $emailcount . ' investors notified.');
    }

    protected function dispatchBulkEmails(Update $update)
    {
        $investorAccounts = Investments::where('project_id', $update->project_id)
            ->with('account')
            ->get()
            ->pluck('account')
            ->filter()
            ->unique('email');

        $emails = $investorAccounts->pluck('email')->filter()->all();

        // Prepare email data
        $mailData = [
            'content' => $update->comment,
            'url' => url('/investor/dashboard'),
        ];
        // Also need to send to Ben and Scott
        $emails = array_merge($emails, ['ben@rise-capital.uk', 'scott@rise-capital.uk']);

        foreach ($emails as $email) {
            Mail::send('emails.project_update', $mailData, function ($message) use ($email) {
                $message->to($email)
                    ->subject('New Project Update');
            });
        }

        // Count emails sent (excluding Ben and Scott)
        $emailcount = max(count($emails) - 2, 0);

        return $emailcount;
    }

    // Function to send update email to just Ben, Scott and Chris

    public function sendSelectiveEmails(Update $update)
    {

        $mailData = [
            'content' => $update->comment,
            'url' => url('/investor/dashboard'),
        ];

        // Only send to Ben, Scott and Chris
        $emails = ['ben@rise-capital.uk', 'scott@rise-capital.uk', 'chris@jaevee.co.uk'];

        // if we are local, only send to chris
        if (app()->environment('local')) {
            $emails = ['chris@jaevee.co.uk'];
        }

        foreach ($emails as $email) {
            Mail::send('emails.project_update', $mailData, function ($message) use ($email) {
                $message->to($email)
                    ->subject('(Test) New Project Update');
            });
        }

        return redirect()->route('admin.updates.index')
            ->with('success', 'Test email sent to ' . implode(', ', $emails));
    }

    // Shows a screen to confirm sending bulk emails for a specific update

    public function bulkEmailPreflight($id)
    {
        $update = Update::findOrFail($id);

        $investorAccounts = Investments::where('project_id', $update->project_id)
            ->with('account')
            ->get()
            ->pluck('account')
            ->filter()
            ->unique('email');

        return view('admin.updates.bulk_email_preflight', compact('update', 'investorAccounts'));
    }

    // Function to send a test email
    public function sendTestEmail()
    {
        $mailData = [
            'content' => 'This is a test email.',
            'url' => url('/investor/dashboard'),
        ];

        Mail::send('emails.project_update', $mailData, function ($message) {
            $message->to('chris@jaevee.co.uk')
                ->subject('Test Project Update');
        });

        return 'Test email sent.';
    }
}
